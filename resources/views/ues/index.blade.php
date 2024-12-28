@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12 px-6">
    <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-8">Liste des UEs</h1>
    <form action="{{ route('ues.create') }}" class="mb-6">
        @csrf
        <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition">Ajouter une UE</button>
    </form>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200 text-gray-600">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium">Code</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Nom</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Crédits ECTS</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Semestre</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($ues as $ue)
                <tr>
                    <td class="px-6 py-4 text-gray-700">{{ $ue->code }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $ue->nom }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $ue->credits_ects }}</td>
                    <td class="px-6 py-4 text-gray-700">S{{ $ue->semestre }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <form action="{{ route('ues.edit', $ue->id) }}" method="GET">
                            @csrf
                            <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition">Modifier</button>
                        </form>
                        <form action="{{ route('ues.destroy', $ue->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white font-semibold py-2 px-4 rounded hover:bg-red-600 transition">Supprimer</button>
                        </form>
                        <select onchange="location = this.value;" class="bg-gray-100 border border-gray-300 text-gray-700 py-2 px-4 rounded">
                            <option value="" disabled selected>Voir la Moyenne d'une UE pour un Etudiant</option>
                            @foreach($etudiants as $etudiant)
                                <option value="{{ route('ues.moyenne', ['ue' => $ue->id, 'etudiant' => $etudiant->id]) }}">
                                    {{ $etudiant->nom }} {{ $etudiant->prenom }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('home') }}" class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 mt-6 rounded hover:bg-blue-600 transition">Accueil</a>
</div>
@endsection
