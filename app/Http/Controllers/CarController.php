<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::with(['documents', 'rentals' => function ($query) {
            $query->where('status', 'active');
        }])->latest()->paginate(10);

        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'registration_number' => 'required|unique:cars',
            'brand' => 'required',
            'model' => 'required',
            'type' => 'required',
            'mileage' => 'required|integer|min:0',
            'purchase_date' => 'required|date',
            'daily_price' => 'required|numeric|min:0',
            'description' => 'nullable',
        ]);

        $car = Car::create($validated);

        return redirect()->route('cars.show', $car)
            ->with('success', 'Voiture ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        $car->load(['documents', 'histories', 'rentals' => function ($query) {
            $query->latest();
        }]);

        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'registration_number' => 'required|unique:cars,registration_number,' . $car->id,
            'brand' => 'required',
            'model' => 'required',
            'type' => 'required',
            'mileage' => 'required|integer|min:0',
            'purchase_date' => 'required|date',
            'daily_price' => 'required|numeric|min:0',
            'description' => 'nullable',
        ]);

        $car->update($validated);

        return redirect()->route('cars.show', $car)
            ->with('success', 'Voiture mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        // Supprimer les documents associés
        foreach ($car->documents as $document) {
            Storage::delete($document->file_path);
        }

        $car->delete();

        return redirect()->route('cars.index')
            ->with('success', 'Voiture supprimée avec succès.');
    }

    public function history(Car $car)
    {
        $histories = $car->histories()->latest()->get();
        dd($histories); // This will dump and die with the histories data
        return view('cars.history', compact('car', 'histories'));
    }
}
