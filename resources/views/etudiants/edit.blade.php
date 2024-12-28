<!-- resources/views/etudiants/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Modifier un Étudiant')

@section('content')
<div class="container mx-auto py-12 px-6">
    <h1 class="text-center text-4xl font-extrabold text-gray-800 mb-12">Modifier l'Étudiant : {{ $etudiant->numero_etudiant }}</h1>
    <a href="{{ route('etudiants.index') }}" class="inline-block bg-gray-200 text-gray-800 font-semibold py-2 px-4 rounded hover:bg-gray-300 transition mb-4">Retour à la liste des Étudiants</a>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Oups ! Il y a quelques problèmes avec votre entrée :</strong>
            <ul class="mt-2 mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Fermer</title><path d="M14.348 5.652a.5.5 0 00-.707 0L10 9.293 6.357 5.65a.5.5 0 10-.707.708l3.643 3.642-3.643 3.642a.5.5 0 00.707.708L10 10.707l3.642 3.642a.5.5 0 00.707-.707l-3.642-3.642 3.642-3.642a.5.5 0 000-.707z"/></svg>
            </span>
        </div>
    @endif

    <form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="numero_etudiant" class="block text-gray-700">Numéro de l'Étudiant</label>
            <input type="text" id="numero_etudiant" name="numero_etudiant" class="form-input mt-1 block w-full @error('numero_etudiant') border-red-500 @enderror" value="{{ old('numero_etudiant', $etudiant->numero_etudiant) }}" required>
            @error('numero_etudiant')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="nom" class="block text-gray-700">Nom</label>
            <input type="text" id="nom" name="nom" class="form-input mt-1 block w-full @error('nom') border-red-500 @enderror" value="{{ old('nom', $etudiant->nom) }}" required>
            @error('nom')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="prenom" class="block text-gray-700">Prénom</label>
            <input type="text" id="prenom" name="prenom" class="form-input mt-1 block w-full @error('prenom') border-red-500 @enderror" value="{{ old('prenom', $etudiant->prenom) }}" required>
            @error('prenom')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="niveau" class="block text-gray-700">Niveau</label>
            <select id="niveau" name="niveau" class="form-select mt-1 block w-full @error('niveau') border-red-500 @enderror" required>
                <option value="L1" {{ old('niveau', $etudiant->niveau) == 'L1' ? 'selected' : '' }}>L1</option>
                <option value="L2" {{ old('niveau', $etudiant->niveau) == 'L2' ? 'selected' : '' }}>L2</option>
                <option value="L3" {{ old('niveau', $etudiant->niveau) == 'L3' ? 'selected' : '' }}>L3</option>
            </select>
            @error('niveau')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition">Mettre à jour</button>
    </form>
</div>
@endsection
