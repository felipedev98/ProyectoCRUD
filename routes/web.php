<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BodegaController;
use App\Http\Controllers\ProductoController;
use App\Models\Producto;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('bodegas', BodegaController::class)
    // ->only(['index', 'create', 'show', 'store', 'edit', 'update', 'destroy', 'show_productos'])
    ->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';

Route::resource('productos', ProductoController::class)
    // ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
