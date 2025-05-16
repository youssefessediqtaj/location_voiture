@extends('layouts.app')

@section('title', 'Historique des Voitures')

@section('content')
<div class="max-w-6xl mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Historique des Voitures</h2>
    </div>
    <div class="bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Voiture</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Utilisateur</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($histories as $history)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $history->car->brand ?? '-' }} {{ $history->car->model ?? '' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($history->type) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $history->description }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $history->created_at->format('Y-m-d') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $history->user->name ?? '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                        <a href="{{ route('car-histories.show', $history) }}" class="text-blue-600 hover:underline">Voir</a>
                        <a href="{{ route('car-histories.edit', $history) }}" class="text-yellow-600 hover:underline">Éditer</a>
                        <form action="{{ route('car-histories.destroy', $history) }}" method="POST" onsubmit="return confirm('Supprimer cet historique ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">Aucun historique enregistré.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $histories->links() }}
    </div>
</div>
@endsection 