<?php

namespace App\Http\Controllers;

use App\Models\Ec;
use App\Models\UE;
use Illuminate\Http\Request;

class EcController extends Controller
{
    public function index()
    {
        $ecs = Ec::with('ue')->get();
        return view('ecs.index', compact('ecs'));
    }

    public function create()
    {
        $ues = UE::all();
        return view('ecs.create', compact('ues'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => ['required', 'unique:ecs,code', 'regex:/^EC\d{2}$/'],
            'nom' => 'required',
            'coefficient' => 'required|numeric|min:1|max:5',
            'ue_id' => 'required|exists:ues,id'
        ], [
        'code.regex' => 'Le code doit correspondre au format EC##.',
        'code.unique' => 'Ce code est déjà utilisé.',  
        ]);
        Ec::create($request->all());

        return redirect()->route('ecs.index')->with('success', 'Élément Constitutif (EC) créé avec succès.');
    }

    public function edit(Ec $ec)
    {
        $ues = UE::all();
        return view('ecs.edit', compact('ec', 'ues'));
    }

  

public function update(Request $request, $id)
{
    $request->validate([
        'code' => ['required', 'unique:ecs,code,'.$id, 'regex:/^EC\d{2}$/'],
        'nom' => 'required|string|max:255',
        'coefficient' => 'required|numeric|min:1|max:5',
        'ue_id' => 'required|exists:ues,id'
    ], [
        'code.regex' => 'Le code doit correspondre au format EC##.',
        'code.unique' => 'Ce code est déjà utilisé.',
    ]);

    $ec = Ec::findOrFail($id);
    $ec->update($request->all());

    return redirect()->route('ecs.index')->with('success', 'EC mis à jour avec succès.');
}


    public function destroy(Ec $ec)
    {
        $ec->delete();

        return redirect()->route('ecs.index')->with('success', 'Élément Constitutif (EC) supprimé avec succès.');
    }
}
