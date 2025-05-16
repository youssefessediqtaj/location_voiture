@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <!-- Stat Cards -->
    <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
        <div class="text-gray-500">Total Véhicules</div>
        <div class="text-3xl font-bold text-blue-600 mt-2">{{ $totalCars ?? '0' }}</div>
    </div>
    <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
        <div class="text-gray-500">Disponibles</div>
        <div class="text-3xl font-bold text-green-600 mt-2">{{ $availableCars ?? '0' }}</div>
    </div>
    <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
        <div class="text-gray-500">Loués</div>
        <div class="text-3xl font-bold text-yellow-500 mt-2">{{ $rentedCars ?? '0' }}</div>
    </div>
    <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
        <div class="text-gray-500">Revenus du mois</div>
        <div class="text-3xl font-bold text-indigo-600 mt-2">{{ $monthlyRevenue ?? '0' }} MAD</div>
    </div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Chart -->
    <div class="bg-white rounded-lg shadow p-6 md:col-span-2">
        <h3 class="text-lg font-semibold mb-4">Revenus vs Dépenses (mois courant)</h3>
        <canvas id="revenueExpenseChart" height="120"></canvas>
    </div>
    <!-- Dernières locations -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Dernières locations</h3>
        <ul class="divide-y divide-gray-200">
            @forelse($recentRentals ?? [] as $rental)
                <li class="py-2">
                    <div class="flex flex-col">
                        <span class="font-semibold">{{ $rental->user->name ?? 'Client inconnu' }}</span>
                        <span class="text-sm text-gray-500">{{ $rental->car->brand ?? '' }} {{ $rental->car->model ?? '' }}</span>
                        <span class="text-xs text-gray-400">{{ $rental->start_date }} - {{ $rental->end_date ?? 'En cours' }}</span>
                    </div>
                </li>
            @empty
                <li class="py-2 text-gray-500">Aucune location récente.</li>
            @endforelse
        </ul>
    </div>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('revenueExpenseChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($chartLabels ?? []) !!},
            datasets: [
                {
                    label: 'Revenus',
                    data: {!! json_encode($chartRevenues ?? []) !!},
                    borderColor: '#2563eb',
                    backgroundColor: 'rgba(37,99,235,0.1)',
                    fill: true,
                    tension: 0.4,
                },
                {
                    label: 'Dépenses',
                    data: {!! json_encode($chartExpenses ?? []) !!},
                    borderColor: '#f59e42',
                    backgroundColor: 'rgba(245,158,66,0.1)',
                    fill: true,
                    tension: 0.4,
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true },
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endpush
@endsection 