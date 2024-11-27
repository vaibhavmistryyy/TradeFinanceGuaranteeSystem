<?php

use App\Http\Controllers\GuaranteeController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

Route::post('/bulk-upload', [FileController::class, 'upload'])->name('bulk-upload');


Route::middleware(['auth'])->group(function () {
    Route::resource('guarantees', GuaranteeController::class);
});

Route::get('guarantees/create', [GuaranteeController::class, 'create'])->name('guarantees.create');
Route::post('guarantees', [GuaranteeController::class, 'store'])->name('guarantees.store');

// Default route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route with authentication and email verification
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes protected by authentication
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Protecting guarantee-related routes with authentication
    Route::resource('guarantees', GuaranteeController::class);
    
    

});

require __DIR__.'/auth.php';
