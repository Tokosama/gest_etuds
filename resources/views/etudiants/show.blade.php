<!-- resources/views/etudiants/show.blade.php -->
@extends('layouts.app')

@section('title', 'Résultats de l\'Étudiant')

@section('header', 'Résultats de l\'Étudiant')

@section('content')
    <div class="container">
        <h1>Résultats de {{ $etudiant->nom }} {{ $etudiant->prenom }}</h1>
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th>UE</th>
                    <th>Moyenne</th>
                    <th>Crédits ECTS</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach($etudiant->notes as $note)
                    <tr>
                        <td>{{ $note->ec->ue->code }} - {{ $note->ec->ue->nom }}</td>
                        <td>{{ $note->note }}</td>
                        <td>{{ $note->ec->ue->credits_ects }}</td>
                        <td>{{ $note->note >= 10 ? 'Validé' : 'Non Validé' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
