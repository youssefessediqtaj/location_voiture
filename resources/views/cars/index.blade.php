@extends('layouts.app')

@section('title', 'Liste des voitures')

@section('content')
<div class="max-w-6xl mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Cars</h2>
        <a href="{{ route('cars.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Car</a>
    </div>
    <div class="bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Model</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Brand</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Year</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">License Plate</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($cars as $car)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $car->model }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $car->brand }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $car->year }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $car->license_plate }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 rounded bg-{{ $car->status === 'available' ? 'green' : 'red' }}-100 text-{{ $car->status === 'available' ? 'green' : 'red' }}-800">{{ ucfirst($car->status) }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                        <a href="{{ route('cars.show', $car) }}" class="text-blue-600 hover:underline">Show</a>
                        <a href="{{ route('cars.edit', $car) }}" class="text-yellow-600 hover:underline">Edit</a>
                        <a href="{{ route('cars.documents.index', $car) }}" class="text-indigo-600 hover:underline">Documents</a>
                        <a href="{{ route('cars.history', $car) }}" class="text-gray-600 hover:underline">History</a>
                        <form action="{{ route('cars.destroy', $car) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-4 py-6 text-center text-gray-500">Aucune voiture enregistrée.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $cars->links() }}
    </div>
</div>
@endsection 