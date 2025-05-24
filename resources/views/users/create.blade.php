@extends('layouts.app')

@section('title', 'Ajouter un utilisateur')

@section('content')
<div class="max-w-xl mx-auto py-8">
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Ajouter un utilisateur</h2>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <x-input-label for="name" :value="__('Nom')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name') }}" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" value="{{ old('email') }}" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="password" :value="__('Mot de passe')" />
                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="roles" :value="__('Rôles')" />
                <select id="roles" name="roles[]" class="mt-1 block w-full border-gray-300 rounded" multiple>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ (collect(old('roles'))->contains($role->id)) ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('roles')" class="mt-2" />
            </div>
            <div class="flex justify-end">
                <x-primary-button>Enregistrer</x-primary-button>
            </div>
        </form>
    </div>
</div>
@endsection 