<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Courier;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourierController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Courier Services Management';
        $couriers = Courier::latest()->get();

        return view('dashboard.couriers.index', compact('couriers'));
    }

    public function create()
    {
        $title = 'Add new courier service credentials';
        return redirect()->back()->with('warning', "Could not create new courier service. Use System's built in courier");
    }

    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'slug' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:couriers,slug'],
        //     'api_key' => ['nullable', 'string', 'max:255'],
        //     'secret_key' => ['nullable', 'string', 'max:255'],
        //     'client_id' => ['nullable', 'string', 'max:255'],
        //     'client_secret' => ['nullable', 'string', 'max:255'],
        //     'base_url' => ['nullable', 'url', 'max:255'],
        //     'store_id' => ['nullable', 'string', 'max:255'],
        //     'description' => ['nullable', 'string'],
        // ]);

        // $validated['is_active'] = $request->boolean('is_active');
        // $validated['is_test_mode'] = $request->boolean('is_test_mode');

        // Courier::create($validated);

        return redirect()->back()
            ->with('warning', "Could not create new courier service. Use System's built in courier");
    }

    public function show(Courier $courier)
    {
        $title = 'Courier details of ' . $courier->name;
        return view('dashboard.couriers.show', compact('courier', 'title'));
    }

    // public function edit(Courier $courier)
    // {
    //     return view('dashboard.couriers.edit', compact('courier'));
    // }

    public function edit(Courier $courier)
    {
        $forms = [
            'pathao',
            'steadfast',
            'redx',
        ];

        abort_unless(in_array($courier->slug, $forms), 404);

        $form = 'dashboard.couriers.forms.' . $courier->slug . '_form';

        return view('dashboard.couriers.edit', compact('courier', 'form'));
    }
    public function update(Request $request, Courier $courier)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                'alpha_dash',
                Rule::unique('couriers', 'slug')->ignore($courier->id),
            ],
            'api_key' => ['nullable', 'string', 'max:255'],
            'secret_key' => ['nullable', 'string', 'max:255'],
            'client_id' => ['nullable', 'string', 'max:255'],
            'client_secret' => ['nullable', 'string', 'max:255'],
            'base_url' => ['nullable', 'url', 'max:255'],
            'store_id' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        // Keep existing credentials if input is empty
        foreach ([
            'api_key',
            'secret_key',
            'client_id',
            'client_secret',
        ] as $field) {
            if (blank($validated[$field] ?? null)) {
                unset($validated[$field]);
            }
        }

        $validated['is_active'] = $request->boolean('is_active');
        $validated['is_test_mode'] = $request->boolean('is_test_mode');

        $courier->update($validated);

        return redirect()
            ->route('dashboard.couriers.show', $courier)
            ->with('success', 'Courier updated successfully.');
    }

    public function destroy(Courier $courier)
    {
        // $courier->delete();

        return redirect()->back()->with('warning', "Could not delete system's built in courier service.");
    }
}
