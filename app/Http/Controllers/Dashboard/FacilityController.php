<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::all();

        return view('dashboard.facilities.index', compact('facilities'));
    }

    public function create()
    {
        return view('dashboard.facilities.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'capacity' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
        ]);

        Facility::create($validated);

        return redirect()->route('facilities.index')->with('success', 'Facility created successfully!');
    }

    public function show(Facility $facility)
    {
        return view('dashboard.facilities.show', compact('facility'));
    }

    public function edit(Facility $facility)
    {
        return view('dashboard.facilities.edit', compact('facility'));
    }

    public function update(Request $request, Facility $facility)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'capacity' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $facility->update($validated);

        return redirect()->route('facilities.index')->with('success', 'Facility updated successfully!');
    }

    public function destroy(Facility $facility)
    {
        $facility->delete();

        return redirect()->route('facilities.index')->with('success', 'Facility deleted successfully!');
    }
}
