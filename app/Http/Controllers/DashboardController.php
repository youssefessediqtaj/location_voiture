<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Expense;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistiques des voitures
        $totalCars = Car::count();
        $availableCars = Car::where('status', 'available')->count();
        $rentedCars = Car::where('status', 'rented')->count();
        $monthlyRevenue = Rental::whereYear('start_date', now()->year)
            ->whereMonth('start_date', now()->month)
            ->sum('total_price');

        // Générer les labels et données pour le graphique (revenus vs dépenses sur les 6 derniers mois)
        $months = collect(range(0, 5))->map(function ($i) {
            return now()->subMonths(5 - $i)->format('Y-m');
        });
        $chartLabels = $months->map(function ($m) {
            return \Carbon\Carbon::createFromFormat('Y-m', $m)->format('M Y');
        });
        $chartRevenues = $months->map(function ($m) {
            return Rental::whereYear('start_date', substr($m, 0, 4))
                ->whereMonth('start_date', substr($m, 5, 2))
                ->sum('total_price');
        });
        $chartExpenses = $months->map(function ($m) {
            return Expense::whereYear('date', substr($m, 0, 4))
                ->whereMonth('date', substr($m, 5, 2))
                ->sum('amount');
        });

        // Dernières locations
        $recentRentals = Rental::with(['car', 'user'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalCars',
            'availableCars',
            'rentedCars',
            'monthlyRevenue',
            'chartLabels',
            'chartRevenues',
            'chartExpenses',
            'recentRentals'
        ));
    }
}
