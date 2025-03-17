<?php

use App\Http\Controllers\CompetenciasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/competencias', [CompetenciasController::class, 'index'])->name('competencias');
Route::post('competencias', [CompetenciasController::class, 'store'])->name('competencias.store');
Route::get('/competencias/{competenciaTitulo}', [CompetenciasController::class, 'show'])->middleware(['verified'])->name('competencias.show');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
