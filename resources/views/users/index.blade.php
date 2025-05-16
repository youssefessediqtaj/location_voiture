@extends('layouts.app')

@section('title', 'Gestion des Utilisateurs')

@section('content')
<div class="max-w-6xl mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Utilisateurs</h2>
        <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Ajouter un utilisateur</a>
    </div>
    <div class="bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rôles</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @foreach($user->roles as $role)
                            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded mr-1">{{ $role->name }}</span>
                        @endforeach
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                        <a href="{{ route('users.show', $user) }}" class="text-blue-600 hover:underline">Voir</a>
                        <a href="{{ route('users.edit', $user) }}" class="text-yellow-600 hover:underline">Éditer</a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Supprimer cet utilisateur ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-6 text-center text-gray-500">Aucun utilisateur enregistré.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
@endsection 