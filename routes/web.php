<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
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

    Route::get('/todos', [TodoController::class,'index'])->name('todos.index');
    Route::post('/todos',[TodoController::class,'store'])->name('todos.store');
    Route::get('/todos/{todo}/edit',[TodoController::class,'edit'])->name('todos.edit');
    Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])
    ->name('todos.destroy');
    Route::put('/todos/{todo}', [TodoController::class,'update'])->name('todos.update');

    Route::patch('/todos/{todo}/toggle', [TodoController::class, 'toggle'])
    ->name('todos.toggle');
});

require __DIR__.'/auth.php';
