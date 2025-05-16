@extends('layouts.app')

@section('title', 'Car Documents')

@section('content')
<div class="max-w-6xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-6">Documents for {{ $car->brand }} {{ $car->model }}</h2>
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Document Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">File</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Expiry Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($documents as $doc)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $doc->document_type }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="text-blue-600 hover:underline">View</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $doc->expiry_date }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $doc->description }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('cars.documents.edit', [$car, $doc]) }}" class="text-yellow-600 hover:underline">Edit</a>
                        <form action="{{ route('cars.documents.destroy', [$car, $doc]) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">No documents found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        <a href="{{ route('cars.documents.create', $car) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Document</a>
    </div>
</div>
@endsection 