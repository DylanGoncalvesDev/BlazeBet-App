<?php

namespace App\Http\Controllers;

use App\Models\Prediction;
use App\Models\SportMatch;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PredictionController extends Controller
{
    //
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'match_id' => 'required|exists:matches,id',
            'prediction' => 'required|string|in:home,draw,away',
            'home_score_prediction' => 'required|integer|min:0|max:999',
            'away_score_prediction' => 'required|integer|min:0|max:999',
        ]);

        $match = SportMatch::findOrFail($request->match_id);

        /** @var SportMatch $match */
        if (now()->greaterThanOrEqualTo($match->date)) {
            return redirect()->back()->with('danger', '¡El partido ya comenzó o ha finalizado! No puedes realizar predicciones.');
        }

        Prediction::create([
            'user_id' => auth()->id(),
            'match_id' => $request->match_id,
            'status' => 'pending',
            'prediction' => $request->prediction,
            'home_score_prediction' => $request->home_score_prediction,
            'away_score_prediction' => $request->away_score_prediction,
        ]);

        return redirect()->route('matches.index')->with('success', '¡Predicción creada con éxito!');

    }
}
