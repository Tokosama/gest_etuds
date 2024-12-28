@extends('layouts.app')

@section('title', 'Modifier une Note')

@section('header', 'Modification d\'une Note pour un Élément Constitutif (EC)')

@section('content')
    <div class="container">
        <h1>Modifier une Note</h1>
        <form action="{{ route('notes.update', $note->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="etudiant_id" class="block text-gray-700">Étudiant</label>
                <select name="etudiant_id" id="etudiant_id" class="form-select mt-1 block w-full">
                    @foreach($etudiants as $etudiant)
                        <option value="{{ $etudiant->id }}" {{ $note->etudiant_id == $etudiant->id ? 'selected' : '' }}>
                            {{ $etudiant->numero_etudiant }} - {{ $etudiant->nom }} {{ $etudiant->prenom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="ec_id" class="block text-gray-700">Élément Constitutif (EC)</label>
                <select name="ec_id" id="ec_id" class="form-select mt-1 block w-full">
                    @foreach($ecs as $ec)
                        <option value="{{ $ec->id }}" {{ $note->ec_id == $ec->id ? 'selected' : '' }}>
                            {{ $ec->code }} - {{ $ec->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="note" class="block text-gray-700">Note</label>
                <input type="number" name="note" id="note" min="0" max="20" step="0.25" class="form-input mt-1 block w-full" value="{{ $note->note }}">
            </div>
            <div class="mb-4">
                <label for="session" class="block text-gray-700">Session</label>
                <select name="session" id="session" class="form-select mt-1 block w-full">
                    <option value="normale" {{ $note->session == 'normale' ? 'selected' : '' }}>Session Normale</option>
                    <option value="rattrapage" {{ $note->session == 'rattrapage' ? 'selected' : '' }}>Rattrapage</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="date_evaluation" class="block text-gray-700">Date d'Évaluation</label>
                <input type="date" name="date_evaluation" id="date_evaluation" class="form-input mt-1 block w-full" value="{{ $note->date_evaluation->format('Y-m-d') }}">
            </div>
            <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition">Mettre à jour</button>
        </form>
    </div>
@endsection
