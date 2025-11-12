<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\RecordatorioController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');

    Route::prefix('dashboard')->group(function () {
        Route::resource('posts', PostController::class);
        Route::resource('notas', NotaController::class);
        Route::get('/notas/{nota}/recordatorios/create', [RecordatorioController::class, 'create'])->name('recordatorios.create');
        Route::post('/notas/{nota}/recordatorios', [RecordatorioController::class, 'store'])->name('recordatorios.store');
        Route::get('/recordatorios/{recordatorio}/edit', [RecordatorioController::class, 'edit'])->name('recordatorios.edit');
        Route::put('/recordatorios/{recordatorio}', [RecordatorioController::class, 'update'])->name('recordatorios.update');
        Route::delete('/recordatorios/{recordatorio}', [RecordatorioController::class, 'destroy'])->name('recordatorios.destroy');
    });
});

require __DIR__ . '/auth.php';
