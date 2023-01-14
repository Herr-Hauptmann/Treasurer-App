<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);


/*Rute za zahtjev*/
// Route::get('/zahtjev', [RequestController::class, 'index'])->name('zahtjev.index');
// Route::get('/zahtjev/create', [RequestController::class, 'create'])->name('zahtjev.create');
// Route::post('/zahtjev', [RequestController::class, 'store'])->name('zahtjev.store');
// Route::get('/zahtjev/{id}', [RequestController::class, 'show'])->name('zahtjev.show');

Route::resource('zahtjev', RequestController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
