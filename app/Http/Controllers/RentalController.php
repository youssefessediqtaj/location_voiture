<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rentals = Rental::with(['car', 'user'])->latest()->paginate(10);
        return view('rentals.index', compact('rentals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cars = Car::where('status', 'available')->get();
        $users = User::all();
        return view('rentals.create', compact('cars', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'user_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,active,completed,cancelled',
            'notes' => 'nullable',
        ]);

        $rental = Rental::create($validated);
        // Mettre à jour le statut de la voiture si location active
        if ($rental->status === 'active') {
            $rental->car->update(['status' => 'rented']);
        }
        return redirect()->route('rentals.show', $rental)
            ->with('success', 'Location créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rental $rental)
    {
        $rental->load(['car', 'user']);
        return view('rentals.show', compact('rental'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rental $rental)
    {
        $cars = Car::all();
        $users = User::all();
        return view('rentals.edit', compact('rental', 'cars', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rental $rental)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'user_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,active,completed,cancelled',
            'notes' => 'nullable',
        ]);
        $rental->update($validated);
        // Mettre à jour le statut de la voiture si location active
        if ($rental->status === 'active') {
            $rental->car->update(['status' => 'rented']);
        } elseif ($rental->status === 'completed' || $rental->status === 'cancelled') {
            $rental->car->update(['status' => 'available']);
        }
        return redirect()->route('rentals.show', $rental)
            ->with('success', 'Location mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rental $rental)
    {
        $rental->delete();
        // Remettre la voiture disponible si la location était active
        if ($rental->car && $rental->status === 'active') {
            $rental->car->update(['status' => 'available']);
        }
        return redirect()->route('rentals.index')
            ->with('success', 'Location supprimée avec succès.');
    }
}
