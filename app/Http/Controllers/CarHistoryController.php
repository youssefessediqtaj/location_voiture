<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarHistory;
use Illuminate\Http\Request;

class CarHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Car $car)
    {
        $histories = $car->histories()
            ->with('user')
            ->latest()
            ->paginate(10);

        return view('car-histories.index', compact('car', 'histories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Car $car)
    {
        return view('car-histories.create', compact('car'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Car $car)
    {
        $validated = $request->validate([
            'action_type' => 'required',
            'description' => 'required',
            'mileage' => 'nullable|integer|min:0',
        ]);

        $history = $car->histories()->create([
            'action_type' => $validated['action_type'],
            'description' => $validated['description'],
            'mileage' => $validated['mileage'],
            'user_id' => auth()->id(),
        ]);

        // Mettre à jour le kilométrage de la voiture si fourni
        if ($validated['mileage']) {
            $car->update(['mileage' => $validated['mileage']]);
        }

        return redirect()->route('cars.histories.index', $car)
            ->with('success', 'Historique ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car, CarHistory $history)
    {
        return view('car-histories.show', compact('car', 'history'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
