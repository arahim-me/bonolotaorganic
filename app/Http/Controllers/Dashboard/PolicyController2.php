<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Policy_type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PolicyController extends Controller
{
    public function index()
    {
        $title = 'Policy Types';
        $policyTypes = Policy_type::latest()->get();

        return view('dashboard.policies.index', compact('title', 'policyTypes'));
    }

    public function create()
    {
        $title = 'Create Policy Type';

        return view('dashboard.policies.create', compact('title'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:policy_types,slug'],
            'description' => ['nullable', 'string'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($request->name);
        $validated['is_published'] = $request->boolean('is_published');

        Policy_type::create($validated);

        return redirect()->route('policy-types.index')->with('success', 'Policy type created successfully!');
    }

    public function show(Policy_type $policyType)
    {
        $title = 'Policy Type Details';

        return view('dashboard.policies.show', compact('title', 'policyType'));
    }

    public function edit(Policy_type $policyType)
    {
        $title = 'Edit Policy Type';

        return view('dashboard.policies.edit', compact('title', 'policyType'));
    }

    public function update(Request $request, Policy_type $policyType)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:policy_types,slug,'.$policyType->id],
            'description' => ['nullable', 'string'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($request->name);
        $validated['is_published'] = $request->boolean('is_published');

        $policyType->update($validated);

        return redirect()->route('policy-types.index')->with('success', 'Policy type updated successfully!');
    }

    public function destroy(Policy_type $policyType)
    {
        $policyType->delete();

        return redirect()->route('policy-types.index')->with('success', 'Policy type deleted successfully!');
    }
}
