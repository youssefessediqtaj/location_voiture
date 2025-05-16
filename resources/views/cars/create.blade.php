@extends('layouts.app')

@section('title', 'Ajouter une voiture')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded shadow p-6">
    <h1 class="text-xl font-bold mb-4">Ajouter une voiture</h1>
    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block font-semibold mb-1">Immatriculation *</label>
            <input type="text" name="registration_number" value="{{ old('registration_number') }}" class="w-full border rounded px-3 py-2 @error('registration_number') border-red-500 @enderror" required>
            @error('registration_number')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Marque *</label>
            <input type="text" name="brand" value="{{ old('brand') }}" class="w-full border rounded px-3 py-2 @error('brand') border-red-500 @enderror" required>
            @error('brand')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Modèle *</label>
            <input type="text" name="model" value="{{ old('model') }}" class="w-full border rounded px-3 py-2 @error('model') border-red-500 @enderror" required>
            @error('model')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Type *</label>
            <input type="text" name="type" value="{{ old('type') }}" class="w-full border rounded px-3 py-2 @error('type') border-red-500 @enderror" required>
            @error('type')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Kilométrage *</label>
            <input type="number" name="mileage" value="{{ old('mileage') }}" class="w-full border rounded px-3 py-2 @error('mileage') border-red-500 @enderror" required min="0">
            @error('mileage')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Date d'achat *</label>
            <input type="date" name="purchase_date" value="{{ old('purchase_date') }}" class="w-full border rounded px-3 py-2 @error('purchase_date') border-red-500 @enderror" required>
            @error('purchase_date')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">État *</label>
            <select name="status" class="w-full border rounded px-3 py-2 @error('status') border-red-500 @enderror" required>
                <option value="available" @selected(old('status')=='available')>Disponible</option>
                <option value="rented" @selected(old('status')=='rented')>Louée</option>
                <option value="maintenance" @selected(old('status')=='maintenance')>Maintenance</option>
            </select>
            @error('status')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Prix journalier (€) *</label>
            <input type="number" step="0.01" name="daily_price" value="{{ old('daily_price') }}" class="w-full border rounded px-3 py-2 @error('daily_price') border-red-500 @enderror" required min="0">
            @error('daily_price')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Description</label>
            <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Photos</label>
            <input type="file" name="photos[]" multiple accept="image/*" class="w-full border rounded px-3 py-2">
            <div id="photo-preview" class="flex flex-wrap gap-2 mt-2"></div>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Documents (PDF, images)</label>
            <input type="file" name="documents[]" multiple accept="application/pdf,image/*" class="w-full border rounded px-3 py-2">
            <div id="doc-preview" class="flex flex-wrap gap-2 mt-2"></div>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Enregistrer</button>
        <a href="{{ route('cars.index') }}" class="ml-4 text-gray-600 hover:underline">Annuler</a>
    </form>
</div>
@endsection

@push('scripts')
<script>
// Prévisualisation des photos
const photoInput = document.querySelector('input[name="photos[]"]');
const photoPreview = document.getElementById('photo-preview');
if(photoInput) {
    photoInput.addEventListener('change', function(e) {
        photoPreview.innerHTML = '';
        Array.from(e.target.files).forEach(file => {
            if(file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(ev) {
                    const img = document.createElement('img');
                    img.src = ev.target.result;
                    img.className = 'h-16 rounded shadow';
                    photoPreview.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    });
}
// Prévisualisation des documents
const docInput = document.querySelector('input[name="documents[]"]');
const docPreview = document.getElementById('doc-preview');
if(docInput) {
    docInput.addEventListener('change', function(e) {
        docPreview.innerHTML = '';
        Array.from(e.target.files).forEach(file => {
            const div = document.createElement('div');
            div.className = 'flex items-center gap-1';
            if(file.type === 'application/pdf') {
                div.innerHTML = '<span class="text-red-600">PDF</span> ' + file.name;
            } else if(file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(ev) {
                    const img = document.createElement('img');
                    img.src = ev.target.result;
                    img.className = 'h-10 rounded shadow';
                    div.appendChild(img);
                };
                reader.readAsDataURL(file);
                div.innerHTML += ' ' + file.name;
            } else {
                div.textContent = file.name;
            }
            docPreview.appendChild(div);
        });
    });
}
</script>
@endpush 