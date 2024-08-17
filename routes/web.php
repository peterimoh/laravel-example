<?php

declare(strict_types=1);

use App\Http\Controllers\JobsController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'home', [
    'greeting' => 'Hello',
]);
Route::view('/contact', 'contact');

Route::get('/jobs', [JobsController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/jobs/create', [JobsController::class, 'create']);
    Route::post('/jobs', [JobsController::class, 'store']);
    Route::get('/jobs/{job}/edit', [JobsController::class, 'edit'])->can('edit', 'job');
    Route::patch('/jobs/{job}', [JobsController::class, 'update'])->can('update-job', 'job');
    Route::delete('/jobs/{job}', [JobsController::class, 'destroy'])->can('delete-job', 'job');
});
Route::get('/jobs/{job}', [JobsController::class, 'show']);

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);


