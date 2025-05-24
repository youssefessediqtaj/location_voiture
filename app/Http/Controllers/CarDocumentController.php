<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Car $car)
    {
        $documents = $car->documents()->latest()->paginate(10);
        return view('car-documents.index', compact('car', 'documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Car $car)
    {
        return view('car-documents.create', compact('car'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Car $car)
    {
        $validated = $request->validate([
            'document_type' => 'required',
            'file' => 'required|file|max:10240', // max 10MB
            'expiry_date' => 'nullable|date',
            'description' => 'nullable',
        ]);

        $path = $request->file('file')->store('car-documents');

        $document = $car->documents()->create([
            'document_type' => $validated['document_type'],
            'file_path' => $path,
            'expiry_date' => $validated['expiry_date'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('cars.documents.index', $car)
            ->with('success', 'Document ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car, CarDocument $document)
    {
        return view('car-documents.show', compact('car', 'document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car, CarDocument $document)
    {
        return view('car-documents.edit', compact('car', 'document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car, CarDocument $document)
    {
        $validated = $request->validate([
            'document_type' => 'required',
            'file' => 'nullable|file|max:10240',
            'expiry_date' => 'nullable|date',
            'description' => 'nullable',
        ]);

        if ($request->hasFile('file')) {
            Storage::delete($document->file_path);
            $validated['file_path'] = $request->file('file')->store('car-documents');
        }

        $document->update($validated);

        return redirect()->route('cars.documents.index', $car)
            ->with('success', 'Document mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car, CarDocument $document)
    {
        Storage::delete($document->file_path);
        $document->delete();

        return redirect()->route('cars.documents.index', $car)
            ->with('success', 'Document supprimé avec succès.');
    }
}
