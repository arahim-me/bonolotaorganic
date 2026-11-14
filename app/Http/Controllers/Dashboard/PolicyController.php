<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use App\Models\Policy_type;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createPolicyType($type)
    {
        $title = 'Create Policy of '.Policy_type::findOrFail($type)->name;
        $policy = Policy_type::findOrFail($type);

        return view('dashboard.policies.create', compact('title', 'policy'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'policy_type_id' => 'required|exists:policy_types,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $created = Policy::create([
            'policy_type_id' => $request->input('policy_type_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        if (! $created) {
            return redirect()->back()->with('error', 'Failed to create policy. Please try again.');
        } else {
            return redirect()->route('policy-types.show', $request->policy_type_id)->with('success', 'Policy created successfully.');
        }
    }

    /**,
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
