@extends('layouts.app')

@section('title', 'Edit Rental')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-6">Edit Rental</h2>
    <form action="{{ route('rentals.update', $rental) }}" method="POST" class="bg-white shadow rounded-lg p-6">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block font-semibold mb-1">Car</label>
            <select name="car_id" class="w-full border rounded px-3 py-2">
                @foreach($cars as $car)
                    <option value="{{ $car->id }}" {{ $rental->car_id == $car->id ? 'selected' : '' }}>{{ $car->brand }} {{ $car->model }} ({{ $car->license_plate }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">User</label>
            <select name="user_id" class="w-full border rounded px-3 py-2">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $rental->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Start Date</label>
            <input type="date" name="start_date" value="{{ $rental->start_date }}" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">End Date</label>
            <input type="date" name="end_date" value="{{ $rental->end_date }}" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Total Price</label>
            <input type="number" name="total_price" value="{{ $rental->total_price }}" step="0.01" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="pending" {{ $rental->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="active" {{ $rental->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="completed" {{ $rental->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ $rental->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Notes</label>
            <textarea name="notes" class="w-full border rounded px-3 py-2">{{ $rental->notes }}</textarea>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Rental</button>
        </div>
    </form>
</div>
@endsection 