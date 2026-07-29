<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    //
    public function create(): View {
        return view('competitions.create');
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'name' => 'required|string|unique:competitions,name|max:60', 
            'description' => 'nullable|string|max:500',
            'status' => 'required|string|in:not_started,in_progress,finished', 
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Competition::create([
            'name' => $request->name, 
            'description' => $request->description, 
            'status' => $request->filled('status') ? $request->status : 'not_started',
            'start_date' => $request->start_date, 
            'end_date' => $request->end_date 
        ]);
        return redirect()->route('competitions.index')->with('success', '¡Competition created successfully!');
    }

}
