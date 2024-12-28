<!-- resources/views/ecs/index.blade.php -->
@extends('layouts.app')

@section('title', 'Liste des ECs')

@section('header', 'Liste des ECs')

@section('content')
    <div class="container mx-auto py-12 px-6">
        <h1 class="text-center text-4xl font-extrabold text-gray-800 mb-12">Liste des ECs</h1>
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('ecs.create') }}" class="bg-purple-500 text-white font-semibold py-2 px-4 rounded hover:bg-purple-500 transition">Ajouter un EC</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-gray-600">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium">Code</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Nom</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Coefficient</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Unité d'Enseignement</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($ecs as $ec)
                        <tr>
                            <td class="px-6 py-4 text-gray-700">{{ $ec->code }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $ec->nom }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $ec->coefficient }}</td>
                            <td class="px-6 py-4 text-gray-700">
                                @if($ec->ue)
                                    {{ $ec->ue->code }} - {{ $ec->ue->nom }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="px-6 py-4 flex space-x-2">
                                <a href="{{ route('ecs.edit', $ec->id) }}" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition">Modifier</a>
                                <form action="{{ route('ecs.destroy', $ec->id) }}" method="POST">
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
