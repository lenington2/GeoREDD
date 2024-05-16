<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login')->with('title', 'GeoREDD - Login');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum'])->group(function () {
    /* Route::get('/dashboard/analytics', [Analytics::class, 'index'])->name('dashboard-analytics'); */
    Route::get('/new-project', function () {
        return view('new-project');
    })->name('new-project');

});

/* Route::resource('projects', 'App\Http\Controllers\ProjectsController'); */

