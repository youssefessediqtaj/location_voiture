@extends('layouts.app')

@section('title', 'Ajouter une location')

@section('content')
<div class="max-w-xl mx-auto py-8">
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Ajouter une location</h2>
        <form action="{{ route('rentals.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <x-input-label for="car_id" :value="__('Voiture')" />
                <select id="car_id" name="car_id" class="mt-1 block w-full border-gray-300 rounded" required>
                    <option value="">Sélectionner une voiture</option>
                    @foreach($cars as $car)
                        <option value="{{ $car->id }}" {{ old('car_id') == $car->id ? 'selected' : '' }}>{{ $car->brand }} {{ $car->model }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('car_id')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="user_id" :value="__('Client')" />
                <select id="user_id" name="user_id" class="mt-1 block w-full border-gray-300 rounded" required>
                    <option value="">Sélectionner un client</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="start_date" :value="__('Date de début')" />
                <x-text-input id="start_date" name="start_date" type="date" class="mt-1 block w-full" value="{{ old('start_date') }}" required />
                <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="end_date" :value="__('Date de fin')" />
                <x-text-input id="end_date" name="end_date" type="date" class="mt-1 block w-full" value="{{ old('end_date') }}" />
                <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="total_price" :value="__('Prix total (€)')" />
                <x-text-input id="total_price" name="total_price" type="number" step="0.01" class="mt-1 block w-full" value="{{ old('total_price') }}" required />
                <x-input-error :messages="$errors->get('total_price')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="status" :value="__('Statut')" />
                <select id="status" name="status" class="mt-1 block w-full border-gray-300 rounded" required>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Terminée</option>
                    <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Annulée</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>
            <div class="flex justify-end">
                <x-primary-button>Enregistrer</x-primary-button>
            </div>
        </form>
    </div>
</div>
@endsection 