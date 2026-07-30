<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\SportMatch;
use App\Models\Team;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SportMatchController extends Controller
{
    //
    public function index(): View|RedirectResponse
    {
        if (auth()->user() && auth()->user()->role === 'admin') {
            return redirect()->route('admin.matches.index');
        }
        $matches = SportMatch::with(['homeTeam', 'awayTeam'])->get();

        return view('matches.index', compact('matches'));
    }

    public function create(): View
    {
        $teams = Team::all();
        $competitions = Competition::all();

        return view('matches.create', compact('teams', 'competitions'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'home_team_id' => 'required|exists:teams,id',
            'away_team_id' => 'required|exists:teams,id|different:home_team_id',
            'date' => $request->status === 'upcoming' ? 'required|date|after_or_equal:today' : 'required|date',
            'location' => 'required|string|max:255',
            'stage' => 'required|string|max:100',
            'status' => 'required|in:upcoming,live,finished',
            'home_team_score' => 'nullable|integer|min:0|max:999',
            'away_team_score' => 'nullable|integer|min:0|max:999',
            'sport' => 'required|string|in:american football,soccer football,rugby,basketball,baseball,cricket,softball,volleyball,hockey,handball,futsal',
            'competition_id' => 'required|exists:competitions,id',
        ]);

        SportMatch::create([
            'home_team_id' => $request->home_team_id,
            'away_team_id' => $request->away_team_id,
            'date' => $request->date,
            'location' => $request->location,
            'stage' => $request->stage,
            'status' => $request->status,
            'home_team_score' => $request->home_team_score,
            'away_team_score' => $request->away_team_score,
            'sport' => $request->sport,
            'competition_id' => $request->competition_id,
        ]);

        return redirect()->route('matches.index')->with('success', '¡The Match has been created successfuly!');
    }

    public function edit(SportMatch $sportMatch): View
    {

        return view('matches.edit', compact('sportMatch'));
    }

    public function update(Request $request, SportMatch $sportMatch): RedirectResponse
    {
        $request->validate([
            'home_team_id' => 'required|exists:teams,id',
            'away_team_id' => 'required|exists:teams,id|different:home_team_id',
            'date' => 'required|date',
            'location' => 'required|string',
            'stage' => 'required|string',
            'status' => 'required|in:upcoming,live,finished',
            'home_team_score' => 'nullable|integer|min:0|max:999',
            'away_team_score' => 'nullable|integer|min:0|max:999',
            'sport' => 'required|string|in:american football,soccer football,rugby,basketball,baseball,cricket,softball,volleyball,hockey,handball,futsal',
            'competition_id' => 'required|exists:competitions,id',
        ]);

        $sportMatch->update([
            'home_team_id' => $request->home_team_id,
            'away_team_id' => $request->away_team_id,
            'date' => $request->date,
            'location' => $request->location,
            'stage' => $request->stage,
            'status' => $request->status,
            'home_team_score' => $request->home_team_score,
            'away_team_score' => $request->away_team_score,
            'sport' => $request->sport,
            'competition_id' => $request->competition_id,
        ]);

        return redirect()->back()->with('success', 'The Match has been updated successfuly');
    }
}
