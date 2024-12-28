<!-- resources/views/ues/moyenne.blade.php -->
@extends('layouts.app')

@section('title', 'Moyenne de l\'Étudiant')

@section('header', 'Moyenne de l\'Étudiant')

@section('content')
    <div class="container mx-auto py-12 px-6">
        <h1 class="text-center text-4xl font-extrabold text-gray-800 mb-12">Moyenne de l'Étudiant</h1>
        
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-4">Unité d'Enseignement : {{ $ue->nom }} ({{ $ue->code }})</h2>
                <h3 class="text-lg font-semibold mb-2">Étudiant : {{ $etudiant->nom }} {{ $etudiant->prenom }}</h3>
                <p class="text-lg mb-4">Moyenne : <strong>{{ number_format($moyenne, 2) }}</strong></p>
                <a href="{{ route('ues.index') }}" class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700 transition">Retour à la liste des UEs</a>
            </div>
        </div>
    </div>
@endsection
