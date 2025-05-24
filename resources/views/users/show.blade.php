@extends('layouts.app')

@section('title', 'Détail utilisateur')

@section('content')
<div class="max-w-xl mx-auto py-8">
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Détail utilisateur</h2>
        <div class="mb-4">
            <span class="font-semibold">Nom :</span> {{ $user->name }}<br>
            <span class="font-semibold">Email :</span> {{ $user->email }}<br>
            <span class="font-semibold">Rôles :</span>
            @foreach($user->roles as $role)
                <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded mr-1">{{ $role->name }}</span>
            @endforeach
            <br>
            <span class="font-semibold">Créé le :</span> {{ $user->created_at->format('d/m/Y H:i') }}
        </div>
        <div class="flex space-x-2 mt-6">
            <a href="{{ route('users.edit', $user) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Éditer</a>
            <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Supprimer cet utilisateur ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Supprimer</button>
            </form>
            <a href="{{ route('users.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Retour</a>
        </div>
    </div>
</div>
@endsection 