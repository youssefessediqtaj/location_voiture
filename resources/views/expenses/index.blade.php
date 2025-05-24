@extends('layouts.app')

@section('title', 'Gestion des Finances')

@section('content')
<div class="max-w-6xl mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Dépenses</h2>
        <a href="{{ route('expenses.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Ajouter une dépense</a>
    </div>
    <div class="bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Voiture</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Utilisateur</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Montant</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($expenses as $expense)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $expense->car->brand ?? '-' }} {{ $expense->car->model ?? '' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $expense->user->name ?? '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $expense->date }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ number_format($expense->amount, 2, ',', ' ') }} €</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $expense->category ?? '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                        <a href="{{ route('expenses.show', $expense) }}" class="text-blue-600 hover:underline">Voir</a>
                        <a href="{{ route('expenses.edit', $expense) }}" class="text-yellow-600 hover:underline">Éditer</a>
                        <form action="{{ route('expenses.destroy', $expense) }}" method="POST" onsubmit="return confirm('Supprimer cette dépense ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">Aucune dépense enregistrée.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $expenses->links() }}
    </div>
</div>
@endsection 