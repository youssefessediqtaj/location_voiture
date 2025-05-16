@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8">
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Car Documents</h2>
        <ul class="mb-4">
            @forelse($documents as $doc)
                <li class="mb-2">
                    <a href="{{ asset('storage/' . $doc->file_path) }}" class="text-blue-600 underline" target="_blank">{{ $doc->name }}</a> ({{ $doc->type }})
                </li>
            @empty
                <li class="text-gray-500">No documents found.</li>
            @endforelse
        </ul>
        <form action="{{ route('cars.documents.store', $car) }}" method="POST" enctype="multipart/form-data" class="mt-6">
            @csrf
            <div class="mb-4">
                <x-input-label for="name" :value="__('Document Name')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="type" :value="__('Type')" />
                <x-text-input id="type" name="type" type="text" class="mt-1 block w-full" required />
                <x-input-error :messages="$errors->get('type')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="file" :value="__('File')" />
                <input id="file" name="file" type="file" class="mt-1 block w-full border-gray-300 rounded" required />
                <x-input-error :messages="$errors->get('file')" class="mt-2" />
            </div>
            <div class="flex justify-end">
                <x-primary-button>Upload</x-primary-button>
            </div>
        </form>
        <div class="mt-6">
            <a href="{{ route('cars.show', $car) }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Back to Car</a>
        </div>
    </div>
</div>
@endsection 