<?php

use Illuminate\Support\Facades\Route;
use App\Models\Project;

Route::get('/', function () {
    return view('auth.login')->with('title', 'GeoREDD - Login');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $projects = Project::join('users', 'projects.created_by', '=', 'users.id')
            ->select('projects.*', 'users.name as creator_name')
            ->get();
        return view('dashboard', ['projects' => $projects]);
    })->name('dashboard');
});

Route::middleware(['auth:sanctum'])->group(function () {
    /* Route::get('/dashboard/analytics', [Analytics::class, 'index'])->name('dashboard-analytics'); */
    Route::get('/new-project', function () {
        return view('new-project');
    })->name('new-project');

    Route::post('projects/create', 'App\Http\Controllers\ProjectController@create');

});





/* Route::resource('projects', 'App\Http\Controllers\ProjectsController'); */

