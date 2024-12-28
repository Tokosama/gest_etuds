<!-- resources/views/notes/index.blade.php -->
@extends('layouts.app')

@section('title', 'Liste des Notes')

@section('header', 'Liste des Notes des Étudiants')

@section('content')
    <div class="container mx-auto py-12 px-6">
        <h1 class="text-center text-4xl font-extrabold text-gray-800 mb-12">Liste des Notes des Étudiants</h1>
        <a href="{{ route('notes.create') }}" class="bg-yellow-500 text-white font-semibold py-2 px-4 rounded hover:bg-yellow-600 transition mb-4">Ajouter une Note</a>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-gray-600">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium">Étudiant</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Élément Constitutif (EC)</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Note</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Session</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Date d'Évaluation</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($notes as $note)
                        <tr>
                            <td class="px-6 py-4 text-gray-700">
                                @if($note->etudiant)
                                    {{ $note->etudiant->numero_etudiant }} - {{ $note->etudiant->nom }} {{ $note->etudiant->prenom }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-700">
                                @if($note->ec)
                                    {{ $note->ec->code }} - {{ $note->ec->nom }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-700">{{ $note->note }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ ucfirst($note->session) }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $note->date_evaluation ? $note->date_evaluation->format('d/m/Y') : 'N/A' }}</td>
                            <td class="px-6 py-4 flex space-x-2">
                                <a href="{{ route('notes.edit', $note->id) }}" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition">Modifier</a>
                                <form action="{{ route('notes.destroy', $note->id) }}" method="POST" onsubmit="return confirm('Es-tu sûr de vouloir supprimer cette note ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white font-semibold py-2 px-4 rounded hover:bg-red-600 transition">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('home') }}" class="mt-4 bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition">Accueil</a>
    </div>
@endsection
