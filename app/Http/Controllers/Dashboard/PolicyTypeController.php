<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use App\Models\Policy_type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PolicyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Policy Types';
        $policy_types = Policy_type::latest()->get();
        return view('dashboard.policy_types.index', compact('title', 'policy_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Policy Type';

        return view('dashboard.policy_types.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:policy_types,slug'],
            'description' => ['nullable', 'string'],
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($request->name);

        Policy_type::create($validated);

        return redirect()->back()->with('success', 'Policy type created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $policyType = Policy_type::findOrFail($id);
        $title = 'Policy Type Details of ' . $policyType->name;
        $policies = Policy::where('policy_type_id', $id)->get();

        return view('dashboard.policy_types.show', compact('title', 'policies', 'policyType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Edit Policy Type';
        $policyType = Policy_type::findOrFail($id);

        return view('dashboard.policy_types.edit', compact('title', 'policyType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $policyType = Policy_type::findOrFail($id);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:policy_types,slug,'.$policyType->id],
            'description' => ['nullable', 'string'],
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($request->name);

        $policyType->update($validated);

        return redirect()->back()->with('success', 'Policy type updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $policyType = Policy_type::findOrFail($id);
        $policyType->delete();

        return redirect()->back()->with('success', 'Policy type deleted successfully!');
    }

    // Toggle
    public function toggleStatus($id)
    {
        $policyType = Policy_type::findOrFail($id);
        $policyType->is_published = !$policyType->is_published;
        $policyType->save();

        return redirect()->back()->with('success', 'Policy Type status updated successfully.');
    }
}
