@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Modifier la Dépense</h1>
    <form action="{{ route('expenses.update', $expense) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block font-semibold mb-1">Type</label>
            <select name="type" class="w-full border rounded px-3 py-2">
                <option value="fixe" {{ $expense->type == 'fixe' ? 'selected' : '' }}>Fixe</option>
                <option value="variable" {{ $expense->type == 'variable' ? 'selected' : '' }}>Variable</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Catégorie</label>
            <input type="text" name="category" value="{{ $expense->category }}" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Montant</label>
            <input type="number" name="amount" value="{{ $expense->amount }}" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Date</label>
            <input type="date" name="date" value="{{ $expense->date }}" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Description</label>
            <textarea name="description" class="w-full border rounded px-3 py-2">{{ $expense->description }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Utilisateur</label>
            <select name="user_id" class="w-full border rounded px-3 py-2">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $expense->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Voiture</label>
            <select name="car_id" class="w-full border rounded px-3 py-2">
                <option value="">Aucune</option>
                @foreach($cars as $car)
                    <option value="{{ $car->id }}" {{ $expense->car_id == $car->id ? 'selected' : '' }}>{{ $car->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Mettre à jour</button>
    </form>
</div>
@endsection 