@extends('layouts.app')

@section('title', 'Gestion des Locations')

@section('content')
<div class="max-w-6xl mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Locations</h2>
        <a href="{{ route('rentals.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Ajouter une location</a>
    </div>
    <div class="bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Voiture</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Début</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fin</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($rentals as $rental)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $rental->user->name ?? '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $rental->car->brand ?? '' }} {{ $rental->car->model ?? '' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $rental->start_date }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $rental->end_date ?? 'En cours' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 rounded bg-{{ $rental->status === 'active' ? 'green' : 'gray' }}-100 text-{{ $rental->status === 'active' ? 'green' : 'gray' }}-800">
                            {{ ucfirst($rental->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                        <a href="{{ route('rentals.show', $rental) }}" class="text-blue-600 hover:underline">Voir</a>
                        <a href="{{ route('rentals.edit', $rental) }}" class="text-yellow-600 hover:underline">Éditer</a>
                        <form action="{{ route('rentals.destroy', $rental) }}" method="POST" onsubmit="return confirm('Supprimer cette location ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">Aucune location enregistrée.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $rentals->links() }}
    </div>
</div>
@endsection 