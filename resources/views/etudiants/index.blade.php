<!-- resources/views/etudiants/index.blade.php -->
@extends('layouts.app')

@section('title', 'Liste des Étudiants')

@section('header', 'Liste des Étudiants')

@section('content')
    <div class="container mx-auto py-12 px-6">
        <h1 class="text-center text-4xl font-extrabold text-gray-800 mb-12">Liste des Étudiants</h1>
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('etudiants.create') }}" class="bg-teal-500 text-white font-semibold py-2 px-4 rounded hover:bg-teal-500 transition">Ajouter un Étudiant</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-gray-600">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium">Numéro</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Nom</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Prénom</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($etudiants as $etudiant)
                        <tr>
                            <td class="px-6 py-4 text-gray-700">{{ $etudiant->numero_etudiant }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $etudiant->nom }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $etudiant->prenom }}</td>
                            <td class="px-6 py-4 flex space-x-2">
                                <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition">Modifier</a>
                                <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST" onsubmit="return confirm('Es-tu sûr de vouloir supprimer cet étudiant ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white font-semibold py-2 px-4 rounded hover:bg-red-600 transition">Supprimer</button>
                                </form>
                                <a href="{{ route('etudiants.showBulletin', $etudiant->id) }}" class="bg-rose-500 text-white font-semibold py-2 px-4 rounded hover:bg-rose-500 transition">Voir Bulletin</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('home') }}" class="mt-4 bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition">Accueil</a>
        </div>
    </div>
@endsection
