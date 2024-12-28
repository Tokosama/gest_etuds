<!-- resources/views/bulletins/index.blade.php -->
@extends('layouts.app')

@section('title', 'Bulletins des Étudiants')

@section('content')
    <div class="container mx-auto py-12 px-6">
        <h1 class="text-center text-4xl font-extrabold text-gray-800 mb-12">Bulletins des Étudiants</h1>
        
        @foreach($etudiants as $etudiant)
            <div class="card bg-gradient-to-r from-red-500 to-red-700 text-white shadow-lg rounded-xl overflow-hidden transform transition hover:scale-105 mb-4">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">Bulletin de {{ $etudiant->nom }}</h2>
                    <p class="text-white/90 mb-6">Consultez le bulletin de {{ $etudiant->prenom }} {{ $etudiant->nom }}.</p>
                    <a href="{{ route('etudiants.showBulletin', $etudiant->id) }}" class="inline-block bg-white text-red-700 font-semibold py-2 px-4 rounded hover:bg-gray-200 transition">Voir le Bulletin de {{ $etudiant->prenom }}</a>
                </div>
            </div>
        @endforeach
    </div>
<a href="{{ route('home') }}" class="inline-block bg-gradient-to-r from-blue-500 to-blue-700 text-white font-semibold py-2 px-4 rounded hover:bg-blue-800 transition">Accueil</a>
    @endsection
