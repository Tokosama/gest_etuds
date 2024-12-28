<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Ec;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::with(['etudiant', 'ec'])->get(); // Chargement des relations
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        $etudiants = Etudiant::all();
        $ecs = Ec::all(); // Récupérer les ECs
        return view('notes.create', compact('etudiants', 'ecs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'ec_id' => 'required|exists:ecs,id',
            'note' => 'required|numeric|min:0|max:20',
            'session' => 'required|in:normale,rattrapage',
            'date_evaluation' => 'required|date'
        ]);

        Note::create($request->all());

        return redirect()->route('notes.index')->with('success', 'Note enregistrée avec succès.');
    }

    public function edit($id)
    {
        $note = Note::findOrFail($id);
        $etudiants = Etudiant::all();
        $ecs = Ec::all();
        return view('notes.edit', compact('note', 'etudiants', 'ecs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'ec_id' => 'required|exists:ecs,id',
            'note' => 'required|numeric|min:0|max:20',
            'session' => 'required|in:normale,rattrapage',
            'date_evaluation' => 'required|date'
        ]);

        $note = Note::findOrFail($id);
        $note->update($request->all());

        return redirect()->route('notes.index')->with('success', 'Note mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note supprimée avec succès.');
    }
}
