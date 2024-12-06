<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class,'index']);
Route::post('/', [TaskController::class,'store']);
Route::delete('/{id}', [TaskController::class,'destroy'])->name('task.destroy');
Route::get('/{id}', [TaskController::class,'edit'])->name('task.edit');
Route::put('/{id}', [TaskController::class,'update'])->name('task.update');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
