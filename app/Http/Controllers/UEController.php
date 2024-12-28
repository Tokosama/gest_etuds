<?php

namespace App\Http\Controllers;

use App\Models\UE;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class UEController extends Controller
{
    // Afficher la liste des UEs
    // app/Http/Controllers/UEController.php

public function index()
{
    $ues = UE::all();
    $etudiants = Etudiant::all(); // Récupérer les étudiants
    return view('ues.index', compact('ues', 'etudiants'));
}

    // Afficher le formulaire pour ajouter une UE
    public function create()
    {
        return view('ues.create');
    }

    // Ajouter une nouvelle UE
    public function store(Request $request)
    {
        $request->validate([
            'code' => ['required', 'unique:ues,code', 'regex:/^UE\d{2}$/'],
            'nom' => 'required|string|max:255',
            'credits_ects' => 'required|integer|between:1,30',
            'semestre' => 'required|integer|min:1|max:6',
        ],
        [
            'code.regex' => 'Le code doit correspondre au format UE##.',
            'code.unique' => 'Ce code est déjà utilisé.',
            ]);

        UE::create($request->all());

        return redirect()->route('ues.index')->with('success', 'UE créée avec succès !');
    }

    // Afficher le formulaire pour modifier une UE
    public function edit($id)
    {
        $ue = UE::findOrFail($id);
        return view('ues.edit', compact('ue'))->with('success', 'UE modifiée avec succès !');
    }

    // Mettre à jour une UE
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => ['required', 'unique:ues,code,'.$id, 'regex:/^UE\d{2}$/'],
            'nom' => 'required|string|max:50',
            'credits_ects' => 'required|integer|between:1,30',
            'semestre' => 'required|integer|min:1|max:6',
        ],
        [
            'code.regex' => 'Le code doit correspondre au format UE##.',
            'code.unique' => 'Ce code est déjà utilisé.',  
            ]);

        $ue = UE::findOrFail($id);
        $ue->update($request->all());

        return redirect()->route('ues.index')->with('success', 'UE mise à jour avec succès !');
    }

    // Supprimer une UE
    public function destroy($id)
    {
        $ue = UE::findOrFail($id);
        $ue->delete();

        return redirect()->route('ues.index')->with('success', 'UE supprimée avec succès !');
    }

    // Afficher la moyenne des notes d'un étudiant pour une UE
    public function showMoyenne($ueId, $etudiantId)
    {
        $ue = UE::findOrFail($ueId);
        $etudiant = Etudiant::findOrFail($etudiantId);

        $notes = $ue->ecs->flatMap(function ($ec) use ($etudiant) {
            return $ec->notes->where('etudiant_id', $etudiant->id);
        });

        $totalNotes = $notes->sum('note');
        $nombreNotes = $notes->count();

        if ($nombreNotes == 0) {
            return redirect()->back()->with('error', 'Pas de notes disponibles pour cet étudiant dans cette UE.');
        }

        $moyenne = $totalNotes / $nombreNotes;

        return view('ues.moyenne', compact('ue', 'etudiant', 'moyenne'));
    }

    
}
