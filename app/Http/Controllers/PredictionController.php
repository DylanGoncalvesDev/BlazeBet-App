<?php

namespace App\Http\Controllers;

use App\Models\Prediction;
use App\Models\SportMatch;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PredictionController extends Controller
{
    //

    public function index(): View
    {
        $predictions = Prediction::where('user_id', auth()->id())->get();

        return view('predictions.index', compact('predictions'));
    }

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

    public function edit(Prediction $prediction): View
    {
        $predictions = $prediction;

        return view('predictions.edit', compact('predictions'));
    }

    public function update(Request $request, Prediction $prediction): RedirectResponse
    {
        $predictions = $prediction;
        /** @var Prediction $prediction */
        $request->validate([
            'prediction' => 'required|string|in:home,draw,away',
            'home_score_prediction' => 'required|integer|min:0|max:999',
            'away_score_prediction' => 'required|integer|min:0|max:999',
        ]);

        if ($predictions->user_id !== auth()->id()) {
            abort(403, 'No tienes permiso para editar esta predicción.');
        }

        $match = SportMatch::findOrFail($predictions->match_id);
        /** @var SportMatch $match */
        if (now()->greaterThanOrEqualTo($match->date)) {
            return redirect()->back()->with('danger', '¡El partido ya comenzó! No puedes modificar tu predicción.');
        }

        $predictions->update([
            'prediction' => $request->prediction,
            'home_score_prediction' => $request->home_score_prediction,
            'away_score_prediction' => $request->away_score_prediction,
        ]);

        return redirect()->back()->with('success', 'La Prediccion se actualizo con exito.');
    }

    public function destroy(Prediction $prediction): RedirectResponse
    {

        $predictions = $prediction;

        /** @var Prediction $prediction */
        if ($predictions->user_id !== auth()->id()) {
            abort(403, 'No tienes permiso para eliminar esta predicción.');
        }

        $predictions->delete();

        return redirect()->back()->with('danger', 'Predicción eliminada.');
    }
}
