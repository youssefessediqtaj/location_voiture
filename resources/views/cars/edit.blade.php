@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-8">
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Edit Car</h2>
        <form action="{{ route('cars.update', $car) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <x-input-label for="model" :value="__('Model')" />
                <x-text-input id="model" name="model" type="text" class="mt-1 block w-full" value="{{ old('model', $car->model) }}" required autofocus />
                <x-input-error :messages="$errors->get('model')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="brand" :value="__('Brand')" />
                <x-text-input id="brand" name="brand" type="text" class="mt-1 block w-full" value="{{ old('brand', $car->brand) }}" required />
                <x-input-error :messages="$errors->get('brand')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="year" :value="__('Year')" />
                <x-text-input id="year" name="year" type="number" class="mt-1 block w-full" value="{{ old('year', $car->year) }}" required />
                <x-input-error :messages="$errors->get('year')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="license_plate" :value="__('License Plate')" />
                <x-text-input id="license_plate" name="license_plate" type="text" class="mt-1 block w-full" value="{{ old('license_plate', $car->license_plate) }}" required />
                <x-input-error :messages="$errors->get('license_plate')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="status" :value="__('Status')" />
                <select id="status" name="status" class="mt-1 block w-full border-gray-300 rounded">
                    <option value="available" {{ old('status', $car->status) == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="rented" {{ old('status', $car->status) == 'rented' ? 'selected' : '' }}>Rented</option>
                    <option value="maintenance" {{ old('status', $car->status) == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>
            <div class="flex justify-end">
                <x-primary-button>Update</x-primary-button>
            </div>
        </form>
    </div>
</div>
@endsection 