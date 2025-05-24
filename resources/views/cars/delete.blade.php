@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-8">
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4 text-red-600">Delete Car</h2>
        <p class="mb-4">Are you sure you want to delete the following car?</p>
        <ul class="mb-4">
            <li><strong>Model:</strong> {{ $car->model }}</li>
            <li><strong>Brand:</strong> {{ $car->brand }}</li>
            <li><strong>Year:</strong> {{ $car->year }}</li>
            <li><strong>License Plate:</strong> {{ $car->license_plate }}</li>
        </ul>
        <form action="{{ route('cars.destroy', $car) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex space-x-2">
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                <a href="{{ route('cars.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection 