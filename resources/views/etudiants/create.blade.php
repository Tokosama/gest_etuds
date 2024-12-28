<!-- resources/views/etudiants/create.blade.php -->
@extends('layouts.app')

@section('title', 'Ajouter un Étudiant')

@section('header', 'Ajouter un Nouvel Étudiant')

@section('content')
    <div class="container">
        <h1>Ajouter un Étudiant</h1>
        <form action="{{ route('etudiants.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="numero_etudiant" class="block text-gray-700">Numéro Étudiant</label>
                <input type="text" name="numero_etudiant" id="numero_etudiant" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="nom" class="block text-gray-700">Nom</label>
                <input type="text" name="nom" id="nom" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="prenom" class="block text-gray-700">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="niveau" class="block text-gray-700">Niveau</label>
                <select name="niveau" id="niveau" class="form-select mt-1 block w-full" required>
                    <option value="L1">L1</option>
                    <option value="L2">L2</option>
                    <option value="L3">L3</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition">Ajouter</button>
        </form>
    </div>
@endsection
