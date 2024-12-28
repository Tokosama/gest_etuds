<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\UE;
use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\UE;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::paginate(10);
        return view('etudiants.index', compact('etudiants'));
    }

    public function create()
    {
        return view('etudiants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero_etudiant' => 'required|unique:etudiants,numero_etudiant|max:20',
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'niveau' => 'required|in:L1,L2,L3',
        ]);

        Etudiant::create($request->all());

        return redirect()->route('etudiants.index')->with('success', 'Étudiant ajouté avec succès.');
    }

    public function show(Etudiant $etudiant)
    {
        return view('etudiants.show', compact('etudiant'));
    }

    public function edit($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return view('etudiants.edit', compact('etudiant'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'numero_etudiant' => "required|unique:etudiants,numero_etudiant,{$id}|max:20",
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'niveau' => 'required|in:L1,L2,L3',
        ]);

        $etudiant = Etudiant::findOrFail($id);
        $etudiant->update($request->all());

        return redirect()->route('etudiants.index')->with('success', 'Étudiant mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();

        return redirect()->route('etudiants.index')->with('success', 'Étudiant supprimé avec succès.');
    }

    public function showBulletin($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $ues = UE::with(['ecs.notes' => function($query) use ($etudiant) {
            $query->where('etudiant_id', $etudiant->id);
        }])->get();

        // Calculer la moyenne générale de l'étudiant
        $moyenneGenerale = $this->calculerMoyenneGenerale($etudiant);
        $passe = $moyenneGenerale >= 10;

        return view('etudiants.bulletin', compact('etudiant', 'ues', 'moyenneGenerale', 'passe'));
    }

    private function calculerMoyenneGenerale(Etudiant $etudiant)
    {
        $notes = $etudiant->notes;
        $totalNotes = $notes->sum('note');
        $nombreNotes = $notes->count();

        if ($nombreNotes == 0) {
            return 0;
        }

        return $totalNotes / $nombreNotes;
    }
}
