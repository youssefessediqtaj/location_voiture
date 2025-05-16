<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\CarHistoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarDocumentController;
use Illuminate\Support\Facades\Route;

// Rediriger la page d'accueil vers le dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});



// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Voitures
Route::resource('cars', CarController::class);
Route::resource('cars.documents', CarDocumentController::class);
Route::get('cars/{car}/history', [CarController::class, 'history'])->name('cars.history');

// Locations
Route::resource('rentals', RentalController::class);

// Utilisateurs
Route::resource('users', UserController::class);

// Finances
Route::resource('expenses', ExpenseController::class);

// Historique
Route::get('/history', [CarHistoryController::class, 'index'])->name('history.index');

// Auth routes personnalisées
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Placez ici vos autres routes normalement, sans middleware 'auth'

require __DIR__.'/auth.php';
