<!-- resources/views/etudiants/bulletin.blade.php -->
@extends('layouts.app')

@section('title', 'Bulletin de l\'Étudiant')

@section('header', 'Bulletin de l\'Étudiant')

@section('content')
    <div class="container mx-auto py-12 px-6">
        <h1 class="text-center text-4xl font-extrabold text-gray-800 mb-12">Bulletin de l'Étudiant</h1>
        
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-4">Étudiant : {{ $etudiant->nom }} {{ $etudiant->prenom }}</h2>
                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-gray-200 text-gray-600">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium">Unité d'Enseignement</th>
                            <th class="px-6 py-3 text-left text-sm font-medium">Code</th>
                            <th class="px-6 py-3 text-left text-sm font-medium">Moyenne</th>
                            <th class="px-6 py-3 text-left text-sm font-medium">Validation</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($ues as $ue)
                            @php
                                $notes = $ue->ecs->flatMap->notes;
                                $moyenne = $notes->avg('note');
                                $notesManquantes = $notes->count() < $ue->ecs->count();
                            @endphp
                            <tr>
                                <td class="px-6 py-4 text-gray-700">{{ $ue->nom }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $ue->code }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $notesManquantes ? 'N/A' : number_format($moyenne, 2) }}</td>
                                <td class="px-6 py-4 text-gray-700">
                                    {{ $notesManquantes ? 'Notes Manquantes' : ($moyenne >= 10 ? 'Validée' : 'Non Validée') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div class="mt-6">
                    <h2 class="text-xl font-semibold mb-4">Moyenne Générale : {{ number_format($moyenneGenerale, 2) }}</h2>
                    <p>
                        <strong>Résultat :</strong> 
                        @if($passe)
                            <span class="text-green-500 font-semibold">Passe à l'année suivante</span>
                        @else
                            <span class="text-red-500 font-semibold">Ne passe pas à l'année suivante</span>
                        @endif
                    </p>
                </div>

                <a href="{{ route('etudiants.index') }}" class="inline-block bg-teal-500 text-white font-semibold py-2 px-4 rounded hover:bg-teal-500 transition">Retour à la liste des Étudiants</a>
                <a href="{{ route('bulletins.index') }}" class="inline-block bg-red-500 text-white font-semibold py-2 px-4 rounded hover:bg-red-500 transition">Retour à la liste des bulletins</a>
            </div>
        </div>
    </div>
@endsection
