@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Car History</h2>
        <ul class="divide-y divide-gray-200">
            @forelse($histories as $history)
                <li class="py-4">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="font-semibold">{{ ucfirst($history->type) }}</span> - {{ $history->description }}
                        </div>
                        <div class="text-gray-500 text-sm">{{ $history->created_at->format('Y-m-d') }}</div>
                    </div>
                </li>
            @empty
                <li class="py-4 text-gray-500">No history records found.</li>
            @endforelse
        </ul>
        <div class="mt-6">
            <a href="{{ route('cars.show', $car) }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Back to Car</a>
        </div>
    </div>
</div>
@endsection 