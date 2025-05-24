@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Car Details</h2>
        <div class="mb-4">
            <span class="font-semibold">Model:</span> {{ $car->model }}<br>
            <span class="font-semibold">Brand:</span> {{ $car->brand }}<br>
            <span class="font-semibold">Year:</span> {{ $car->year }}<br>
            <span class="font-semibold">License Plate:</span> {{ $car->license_plate }}<br>
            <span class="font-semibold">Status:</span> <span class="px-2 py-1 rounded bg-{{ $car->status === 'available' ? 'green' : 'red' }}-100 text-{{ $car->status === 'available' ? 'green' : 'red' }}-800">{{ ucfirst($car->status) }}</span>
        </div>
        <div class="mb-4">
            <h3 class="font-semibold mb-2">Documents</h3>
            <ul class="list-disc ml-6">
                @foreach($car->documents as $doc)
                    <li><a href="{{ asset('storage/' . $doc->file_path) }}" class="text-blue-600 underline" target="_blank">{{ $doc->name }}</a> ({{ $doc->type }})</li>
                @endforeach
            </ul>
        </div>
        <div class="mb-4">
            <h3 class="font-semibold mb-2">Rental History</h3>
            <ul class="list-disc ml-6">
                @foreach($car->rentals as $rental)
                    <li>{{ $rental->user->name ?? 'N/A' }}: {{ $rental->start_date }} to {{ $rental->end_date ?? 'Ongoing' }}</li>
                @endforeach
            </ul>
        </div>
        <div class="flex space-x-2 mt-6">
            <a href="{{ route('cars.edit', $car) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
            <form action="{{ route('cars.destroy', $car) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
            </form>
            <a href="{{ route('cars.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Back</a>
        </div>
    </div>
</div>
@endsection 