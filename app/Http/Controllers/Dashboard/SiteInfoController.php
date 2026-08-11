<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SiteInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SiteInfoController extends Controller
{
    public function index()
    {
        $title = 'Site Information';
        $siteInfo = SiteInfo::first();

        return view('dashboard.site-info.index', compact('title', 'siteInfo'));
    }

    public function create()
    {
        $title = 'Create Site Information';
        $siteInfo = new SiteInfo;

        return view('dashboard.site-info.edit', compact('title', 'siteInfo'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateSiteInfo($request);
        $payload = $this->preparePayload($request, $validated);

        SiteInfo::create($payload);

        return redirect()->route('site-info.index')->with('success', 'Site information created successfully!');
    }

    public function show(SiteInfo $siteInfo)
    {
        return redirect()->route('site-info.index');
    }

    public function edit(SiteInfo $siteInfo)
    {
        $title = 'Edit Site Information';

        return view('dashboard.site-info.edit', compact('title', 'siteInfo'));
    }

    public function update(Request $request, SiteInfo $siteInfo)
    {
        $validated = $this->validateSiteInfo($request);
        $payload = $this->preparePayload($request, $validated);

        $siteInfo->fill($payload);
        $siteInfo->save();

        return redirect()->route('site-info.index')->with('success', 'Site information updated successfully!');
    }

    public function destroy(SiteInfo $siteInfo)
    {
        $siteInfo->delete();

        return redirect()->route('site-info.index')->with('success', 'Site information deleted successfully!');
    }

    protected function validateSiteInfo(Request $request): array
    {
        return $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'logo' => ['nullable', 'image', 'max:2048'],
            'favicon' => ['nullable', 'image', 'max:2048'],
            'email' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'socials' => ['nullable', 'array'],
            'socials.*.name' => ['nullable', 'string', 'max:255'],
            'socials.*.url' => ['nullable', 'url', 'max:2048'],
            'socials.*.icon' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
        ]);
    }

    protected function preparePayload(Request $request, array $validated): array
    {
        $siteInfo = $request->route('site_info');

        if ($request->hasFile('logo')) {
            $this->deleteStoredImage($siteInfo?->logo, 'logo');
            $validated['logo'] = $this->uploadImage($request->file('logo'), 'logo');
        } elseif ($request->boolean('remove_logo')) {
            $this->deleteStoredImage($siteInfo?->logo, 'logo');
            $validated['logo'] = null;
        } else {
            $validated['logo'] = $request->input('logo') ?: null;
        }

        if ($request->hasFile('favicon')) {
            $this->deleteStoredImage($siteInfo?->favicon, 'favicon');
            $validated['favicon'] = $this->uploadImage($request->file('favicon'), 'favicon');
        } elseif ($request->boolean('remove_favicon')) {
            $this->deleteStoredImage($siteInfo?->favicon, 'favicon');
            $validated['favicon'] = null;
        } else {
            $validated['favicon'] = $request->input('favicon') ?: null;
        }

        $validated['email'] = $this->normalizeList($request->input('email'));
        $validated['phone'] = $this->normalizeList($request->input('phone'));
        $validated['socials'] = $this->normalizeSocials($request->input('socials', []));
        $validated['address'] = $this->normalizeList($request->input('address'));

        return $validated;
    }

    protected function normalizeList(?string $value): array
    {
        if (blank($value)) {
            return [];
        }

        return collect(preg_split('/\r\n|\r|\n/', $value))
            ->map(fn (string $item): string => trim($item))
            ->filter(fn (string $item): bool => filled($item))
            ->values()
            ->all();
    }

    protected function normalizeSocials(mixed $socials): array
    {
        if (! is_array($socials)) {
            return [];
        }

        return collect($socials)
            ->filter(function ($social) {
                return is_array($social) && (! blank($social['name'] ?? null) || ! blank($social['url'] ?? null));
            })
            ->map(function ($social) {
                return [
                    'name' => trim((string) ($social['name'] ?? '')),
                    'url' => trim((string) ($social['url'] ?? '')),
                    'icon' => trim((string) ($social['icon'] ?? '')),
                ];
            })
            ->values()
            ->all();
    }

    protected function deleteStoredImage(?string $filename, string $field): void
    {
        if (blank($filename)) {
            return;
        }

        $path = public_path('uploads/site-info/'.$field.'/'.$filename);

        if (file_exists($path)) {
            unlink($path);
        }
    }

    protected function uploadImage($file, string $field): string
    {
        $extension = $file->getClientOriginalExtension() ?: 'jpg';
        $filename = $field.'-'.Str::slug(now()->toDateTimeString()).'-'.Str::random(6).'.'.$extension;
        $directory = public_path('uploads/site-info/'.$field);

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $file->move($directory, $filename);

        return $filename;
    }
}
