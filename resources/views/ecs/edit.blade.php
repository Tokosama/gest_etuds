<!-- resources/views/ecs/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Modifier un EC')

@section('header', 'Modifier un Élément Constitutif (EC)')

@section('content')
    <div class="container mx-auto py-12 px-6">
        <h1 class="text-center text-4xl font-extrabold text-gray-800 mb-12">Modifier un Élément Constitutif (EC)</h1>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Attention !</strong>
                <span class="block sm:inline">Il y a des problèmes avec les champs suivants :</span>
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
        <form action="{{ route('ecs.update', $ec->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="code" class="block text-gray-700">Code EC</label>
                <input type="text" name="code" id="code" value="{{ old('code', $ec->code) }}" class="form-input mt-1 block w-full @error('code') border-red-500 @enderror" required>
                @error('code')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="nom" class="block text-gray-700">Nom</label>
                <input type="text" name="nom" id="nom" value="{{ old('nom', $ec->nom) }}" class="form-input mt-1 block w-full @error('nom') border-red-500 @enderror" required>
                @error('nom')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="coefficient" class="block text-gray-700">Coefficient</label>
                <input type="number" name="coefficient" id="coefficient" step="0.01" value="{{ old('coefficient', $ec->coefficient) }}" class="form-input mt-1 block w-full @error('coefficient') border-red-500 @enderror" required>
                @error('coefficient')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="ue_id" class="block text-gray-700">Unité d'Enseignement (UE)</label>
                <select name="ue_id" id="ue_id" class="form-select mt-1 block w-full @error('ue_id') border-red-500 @enderror" required>
                    @foreach($ues as $ue)
                        <option value="{{ $ue->id }}" {{ old('ue_id', $ec->ue_id) == $ue->id ? 'selected' : '' }}>
                            {{ $ue->code }} - {{ $ue->nom }}
                        </option>
                    @endforeach
                </select>
                @error('ue_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition">Mettre à Jour</button>
        </form>
    </div>
@endsection
