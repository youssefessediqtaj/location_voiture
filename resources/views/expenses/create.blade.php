@extends('layouts.app')

@section('title', 'Ajouter une dépense')

@section('content')
<div class="max-w-xl mx-auto py-8">
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Ajouter une dépense</h2>
        <form action="{{ route('expenses.store') }}" method="POST">
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
                <x-input-label for="user_id" :value="__('Utilisateur')" />
                <select id="user_id" name="user_id" class="mt-1 block w-full border-gray-300 rounded" required>
                    <option value="">Sélectionner un utilisateur</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="date" :value="__('Date')" />
                <x-text-input id="date" name="date" type="date" class="mt-1 block w-full" value="{{ old('date') }}" required />
                <x-input-error :messages="$errors->get('date')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="amount" :value="__('Montant (MAD)')" />
                <x-text-input id="amount" name="amount" type="number" step="0.01" class="mt-1 block w-full" value="{{ old('amount') }}" required />
                <x-input-error :messages="$errors->get('amount')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="category" :value="__('Catégorie')" />
                <x-text-input id="category" name="category" type="text" class="mt-1 block w-full" value="{{ old('category') }}" required />
                <x-input-error :messages="$errors->get('category')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="type" :value="__('Type')" />
                <select id="type" name="type" class="mt-1 block w-full border-gray-300 rounded" required>
                    <option value="">Sélectionner un type</option>
                    <option value="fixe" {{ old('type') == 'fixe' ? 'selected' : '' }}>Fixe</option>
                    <option value="variable" {{ old('type') == 'variable' ? 'selected' : '' }}>Variable</option>
                </select>
                <x-input-error :messages="$errors->get('type')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="description" :value="__('Description')" />
                <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 rounded" rows="3">{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div class="flex justify-end">
                <x-primary-button type="submit">Enregistrer</x-primary-button>
            </div>
        </form>
    </div>
</div>
@endsection
