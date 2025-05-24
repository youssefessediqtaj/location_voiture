@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen py-8 bg-[#FAFAFA]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header section -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-[#374151]">Tableau de bord</h1>
                <p class="mt-1 text-[#374151] opacity-75">Aperçu de votre flotte et performances</p>
            </div>
            <div class="mt-4 md:mt-0">
                <button class="bg-[#FACC15] text-[#374151] px-4 py-2 rounded-xl font-medium flex items-center hover:bg-[#FACC15]/90 focus:ring-2 focus:ring-[#06B6D4]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Ajouter un véhicule
                </button>
            </div>
        </div>

        <!-- Stats overview -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
            <div class="bg-white border border-[#06B6D4]/10 rounded-xl p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-[#06B6D4]/5 border border-[#06B6D4]/10 rounded-xl p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#06B6D4]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dt class="text-sm font-medium text-[#374151] opacity-75 truncate">Total Véhicules</dt>
                        <dd class="flex items-baseline">
                            <div class="text-2xl font-semibold text-[#374151]">{{ $totalCars ?? '0' }}</div>
                            <div class="ml-2 flex items-baseline text-sm font-semibold text-[#06B6D4]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 self-center" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                                <span class="ml-1">12%</span>
                            </div>
                        </dd>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-[#06B6D4]/10 rounded-xl p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-[#06B6D4]/5 border border-[#06B6D4]/10 rounded-xl p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#06B6D4]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dt class="text-sm font-medium text-[#374151] opacity-75 truncate">Disponibles</dt>
                        <dd class="flex items-baseline">
                            <div class="text-2xl font-semibold text-[#374151]">{{ $availableCars ?? '0' }}</div>
                            <div class="ml-2 flex items-baseline text-sm font-semibold text-[#06B6D4]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 self-center" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                                <span class="ml-1">8%</span>
                            </div>
                        </dd>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-[#06B6D4]/10 rounded-xl p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-[#06B6D4]/5 border border-[#06B6D4]/10 rounded-xl p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#06B6D4]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dt class="text-sm font-medium text-[#374151] opacity-75 truncate">Loués</dt>
                        <dd class="flex items-baseline">
                            <div class="text-2xl font-semibold text-[#374151]">{{ $rentedCars ?? '0' }}</div>
                            <div class="ml-2 flex items-baseline text-sm font-semibold text-[#06B6D4]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 self-center" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                                <span class="ml-1">5%</span>
                            </div>
                        </dd>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-[#06B6D4]/10 rounded-xl p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-[#06B6D4]/5 border border-[#06B6D4]/10 rounded-xl p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#06B6D4]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dt class="text-sm font-medium text-[#374151] opacity-75 truncate">Revenus du mois</dt>
                        <dd class="flex items-baseline">
                            <div class="text-2xl font-semibold text-[#374151]">{{ $monthlyRevenue ?? '0' }} MAD</div>
                            <div class="ml-2 flex items-baseline text-sm font-semibold text-[#06B6D4]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 self-center" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                                <span class="ml-1">15%</span>
                            </div>
                        </dd>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts and Tables -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Revenue vs Expenses Chart -->
            <div class="lg:col-span-2 bg-white border border-[#06B6D4]/10 rounded-xl p-4 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-[#374151]">Revenus vs Dépenses</h3>
                    <div class="flex space-x-3">
                        <button class="bg-[#FACC15] text-[#374151] px-3 py-1 rounded-xl text-sm font-medium hover:bg-[#FACC15]/90 focus:ring-2 focus:ring-[#06B6D4]">
                            Mois
                        </button>
                        <button class="bg-white border border-[#06B6D4]/10 text-[#374151] px-3 py-1 rounded-xl text-sm font-medium hover:bg-[#06B6D4]/5 focus:ring-2 focus:ring-[#06B6D4]">
                            Trimestre
                        </button>
                        <button class="bg-white border border-[#06B6D4]/10 text-[#374151] px-3 py-1 rounded-xl text-sm font-medium hover:bg-[#06B6D4]/5 focus:ring-2 focus:ring-[#06B6D4]">
                            Année
                        </button>
                    </div>
                </div>
                <div class="mt-3">
                    <canvas id="revenueExpenseChart" height="300"></canvas>
                </div>
            </div>

            <!-- Recent Rentals -->
            <div class="bg-white border border-[#06B6D4]/10 rounded-xl p-4 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-[#374151]">Dernières locations</h3>
                    <button class="text-[#06B6D4] text-sm font-medium hover:text-[#06B6D4]/80">
                        Voir tout
                    </button>
                </div>
                <div class="space-y-4">
                    @forelse($recentRentals ?? [] as $rental)
                        <div class="bg-white border border-[#06B6D4]/10 rounded-xl p-4">
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <h4 class="font-semibold text-[#374151]">{{ $rental->car->brand ?? '' }} {{ $rental->car->model ?? '' }}</h4>
                                    <div class="flex items-center mt-1 text-sm text-[#374151] opacity-75">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        {{ $rental->user->name ?? 'Client inconnu' }}
                                    </div>
                                    <div class="flex items-center mt-1 text-sm text-[#374151] opacity-75">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ $rental->start_date }} - {{ $rental->end_date ?? 'En cours' }}
                                    </div>
                                </div>
                                <div class="ml-4">
                                    @if($rental->end_date === null)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-[#06B6D4]/10 text-[#06B6D4] border border-[#06B6D4]/20">
                                            En cours
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-[#374151]/10 text-[#374151] border border-[#374151]/20">
                                            Terminé
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white border border-[#06B6D4]/10 rounded-xl p-4 text-center py-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-[#374151] opacity-50 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="mt-2 text-[#374151] opacity-75">Aucune location récente.</p>
                            <button class="mt-3 text-[#06B6D4] text-sm font-medium hover:text-[#06B6D4]/80">
                                Créer une location
                            </button>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Fleet summary -->
        <div class="mt-8 bg-white border border-[#06B6D4]/10 rounded-xl shadow-sm">
            <div class="px-4 py-5 sm:px-6 border-b border-[#06B6D4]/10">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-medium text-[#374151]">État de la flotte</h3>
                    <div>
                        <button class="bg-[#FACC15] text-[#374151] px-3 py-1 rounded-xl text-sm font-medium flex items-center hover:bg-[#FACC15]/90 focus:ring-2 focus:ring-[#06B6D4]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                            </svg>
                            Exporter
                        </button>
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 sm:px-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-[#06B6D4]/10">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#374151] opacity-75 uppercase tracking-wider">Véhicule</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#374151] opacity-75 uppercase tracking-wider">Statut</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#374151] opacity-75 uppercase tracking-wider">Kilométrage</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#374151] opacity-75 uppercase tracking-wider">Prochaine maintenance</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#374151] opacity-75 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#06B6D4]/10">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-[#06B6D4]/5 border border-[#06B6D4]/10 rounded-full flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#06B6D4]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-[#374151]">Mercedes Classe C</div>
                                            <div class="text-sm text-[#374151] opacity-75">123-ABC-45</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-[#06B6D4]/10 text-[#06B6D4] border border-[#06B6D4]/20">
                                        Disponible
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-[#374151] opacity-75">
                                    45,320 km
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-[#374151] opacity-75">
                                    Dans 2,680 km
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <button class="text-[#06B6D4] mr-3 hover:text-[#06B6D4]/80">Détails</button>
                                    <button class="text-[#FACC15] hover:text-[#FACC15]/80">Réserver</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-[#06B6D4]/5 border border-[#06B6D4]/10 rounded-full flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#06B6D4]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-[#374151]">BMW Série 5</div>
                                            <div class="text-sm text-[#374151] opacity-75">456-DEF-78</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-[#FACC15]/10 text-[#FACC15] border border-[#FACC15]/20">
                                        En location
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-[#374151] opacity-75">
                                    23,150 km
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-[#374151] opacity-75">
                                    Dans 6,850 km
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <button class="text-[#06B6D4] mr-3 hover:text-[#06B6D4]/80">Détails</button>
                                    <button class="text-[#374151] opacity-50 cursor-not-allowed">Réserver</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-[#06B6D4]/5 border border-[#06B6D4]/10 rounded-full flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#06B6D4]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-[#374151]">Audi A4</div>
                                            <div class="text-sm text-[#374151] opacity-75">789-GHI-01</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-[#EF4444]/10 text-[#EF4444] border border-[#EF4444]/20">
                                        En maintenance
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-[#374151] opacity-75">
                                    67,890 km
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-[#374151] opacity-75">
                                    Après maintenance
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <button class="text-[#06B6D4] mr-3 hover:text-[#06B6D4]/80">Détails</button>
                                    <button class="text-[#374151] opacity-50 cursor-not-allowed">Réserver</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('revenueExpenseChart').getContext('2d');

    // Chart Gradient
    const revenueGradient = ctx.createLinearGradient(0, 0, 0, 400);
    revenueGradient.addColorStop(0, 'rgba(6, 182, 212, 0.1)');
    revenueGradient.addColorStop(1, 'rgba(6, 182, 212, 0)');

    const expenseGradient = ctx.createLinearGradient(0, 0, 0, 400);
    expenseGradient.addColorStop(0, 'rgba(239, 68, 68, 0.1)');
    expenseGradient.addColorStop(1, 'rgba(239, 68, 68, 0)');

    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($chartLabels ?? ['Jan', 'Fév', 'Mars', 'Avr', 'Mai', 'Juin', 'Juil']) !!},
            datasets: [
                {
                    label: 'Revenus',
                    data: {!! json_encode($chartRevenues ?? [4200, 5100, 4800, 6300, 5600, 7100, 8200]) !!},
                    borderColor: '#06B6D4',
                    backgroundColor: revenueGradient,
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#06B6D4',
                    pointBorderColor: '#FFFFFF',
                    pointBorderWidth: 1,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                },
                {
                    label: 'Dépenses',
                    data: {!! json_encode($chartExpenses ?? [2800, 3200, 3000, 3900, 3400, 4200, 4600]) !!},
                    borderColor: '#EF4444',
                    backgroundColor: expenseGradient,
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#EF4444',
                    pointBorderColor: '#FFFFFF',
                    pointBorderWidth: 1,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    align: 'end',
                    labels: {
                        boxWidth: 12,
                        usePointStyle: true,
                        pointStyle: 'circle',
                        color: '#374151',
                        font: {
                            size: 12
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(255, 255, 255, 0.9)',
                    titleColor: '#374151',
                    bodyColor: '#374151',
                    borderColor: 'rgba(6, 182, 212, 0.1)',
                    borderWidth: 1,
                    bodyFont: {
                        size: 13
                    },
                    titleFont: {
                        size: 14,
                        weight: 'bold'
                    },
                    padding: 10,
                    usePointStyle: true,
                    mode: 'index',
                    intersect: false,
                    callbacks: {
                        labelPointStyle: function(context) {
                            return {
                                pointStyle: 'rectRounded',
                                rotation: 0
                            };
                        },
                        label: function(context) {
                            let label = context.dataset.label || '';
                            return label + ': ' + context.parsed.y.toLocaleString() + ' MAD';
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        color: 'rgba(6, 182, 212, 0.05)',
                        lineWidth: 1
                    },
                    ticks: {
                        color: '#374151',
                        font: {
                            size: 12
                        }
                    }
                },
                y: {
                    grid: {
                        color: 'rgba(6, 182, 212, 0.05)',
                        lineWidth: 1
                    },
                    ticks: {
                        color: '#374151',
                        font: {
                            size: 12
                        }
                    }
                }
            }
        }
    });
</script>
@endpush
@endsection
