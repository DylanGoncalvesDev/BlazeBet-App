<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    //
    public function create(): View
    {
        return view('teams.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|unique:teams,name|max:50',
            'logo' => 'nullable|string|max:100',
            'country' => 'required|string|max:50',
            'founded_at' => 'required|integer|min:1800|max:'.date('Y'),
            'type' => 'required|string|in:club,national',
            'sport' => 'required|string|in:american football,soccer football,rugby,basketball,baseball,cricket,softball,volleyball,hockey,handball,futsal',
        ]);

        Team::create([
            'name' => $request->name,
            'logo' => $request->filled('logo') ? $request->logo : 'default.png',
            'country' => $request->country,
            'founded_at' => $request->founded_at,
            'type' => $request->type,
            'sport' => $request->sport,
        ]);

        return redirect()->route('teams.index')->with('success', '¡Team created successfully!');
    }
}
