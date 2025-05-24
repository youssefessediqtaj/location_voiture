@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Détails de la Dépense</h1>
    <div class="bg-white shadow-md rounded-lg p-6">
        <p><strong>Type:</strong> {{ $expense->type }}</p>
        <p><strong>Catégorie:</strong> {{ $expense->category }}</p>
        <p><strong>Montant:</strong> {{ $expense->amount }} MAD</p>
        <p><strong>Date:</strong> {{ $expense->date }}</p>
        <p><strong>Description:</strong> {{ $expense->description }}</p>
        <p><strong>Utilisateur:</strong> {{ $expense->user->name }}</p>
        <p><strong>Voiture:</strong> {{ $expense->car ? $expense->car->name : 'N/A' }}</p>
    </div>
    <div class="mt-4">
        <a href="{{ route('expenses.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Retour à la liste</a>
    </div>
</div>
@endsection 