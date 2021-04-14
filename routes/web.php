<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::view('/', 'index');

Route::get('dashboard', [App\Http\Controllers\PageController::class, 'dashboard'])
->middleware('auth:sanctum')
->name('dashboard');

Route::resource('notes', App\Http\Controllers\NoteController::class)
->middleware('auth:sanctum');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
