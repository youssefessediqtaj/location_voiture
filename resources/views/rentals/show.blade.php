@extends('layouts.app')

@section('title', 'Rental Details')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-6">Rental Details</h2>
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="bg-white shadow rounded-lg p-6">
        <div class="mb-4">
            <h3 class="font-semibold">Car</h3>
            <p>{{ $rental->car->brand }} {{ $rental->car->model }} ({{ $rental->car->license_plate }})</p>
        </div>
        <div class="mb-4">
            <h3 class="font-semibold">User</h3>
            <p>{{ $rental->user->name }}</p>
        </div>
        <div class="mb-4">
            <h3 class="font-semibold">Start Date</h3>
            <p>{{ $rental->start_date }}</p>
        </div>
        <div class="mb-4">
            <h3 class="font-semibold">End Date</h3>
            <p>{{ $rental->end_date }}</p>
        </div>
        <div class="mb-4">
            <h3 class="font-semibold">Total Price</h3>
            <p>{{ number_format($rental->total_price, 2) }} MAD</p>
        </div>
        <div class="mb-4">
            <h3 class="font-semibold">Status</h3>
            <p>{{ ucfirst($rental->status) }}</p>
        </div>
        <div class="mb-4">
            <h3 class="font-semibold">Notes</h3>
            <p>{{ $rental->notes ?? 'No notes' }}</p>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('rentals.edit', $rental) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit Rental</a>
        </div>
    </div>
</div>
@endsection 