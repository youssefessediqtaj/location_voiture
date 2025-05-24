<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::with(['car', 'user'])->latest()->paginate(10);
        return view('expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cars = Car::all();
        $users = User::all();
        return view('expenses.create', compact('cars', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:fixe,variable',
            'category' => 'required',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'description' => 'nullable',
            'user_id' => 'required|exists:users,id',
            'car_id' => 'nullable|exists:cars,id',
        ]);

        // Debugging/ This will dump and die with the validated data

        $expense = Expense::create($validated);
        //dd($validated);
        return redirect()->route('expenses.show', $expense)
            ->with('success', 'Dépense enregistrée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        $expense->load(['car', 'user']);
        return view('expenses.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $cars = Car::all();
        $users = User::all();
        return view('expenses.edit', compact('expense', 'cars', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $validated = $request->validate([
            'type' => 'required|in:fixe,variable',
            'category' => 'required',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'description' => 'nullable',
            'user_id' => 'required|exists:users,id',
            'car_id' => 'nullable|exists:cars,id',
        ]);
        $expense->update($validated);
        return redirect()->route('expenses.show', $expense)
            ->with('success', 'Dépense mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index')
            ->with('success', 'Dépense supprimée avec succès.');
    }
}
