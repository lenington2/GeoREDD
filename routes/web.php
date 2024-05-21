<?php

use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Http\Controllers\ProjectController;
use illuminate\Support\Facades\Auth;

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
        $role = Auth::user()->role;
        if($role == 'admin') {
            return view('dashboard', ['projects' => $projects]);
        } else {
            return view('dashboardUser', ['projects' => $projects]);
        }
    })->name('dashboard');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/new-project', function () {
            return view('new-project');
        })->name('new-project');

        Route::get('/edit-project/{id}', function ($id) {
            $project = Project::findOrFail($id);
            return view('edit-project', ['project' => $project]);
        })->name('edit-project');

        Route::post('projects/create', 'App\Http\Controllers\ProjectController@create');
        Route::delete('projects/{id}/destroy', 'App\Http\Controllers\ProjectController@destroy');
        Route::post('projects/update/{id}', 'App\Http\Controllers\ProjectController@update');
    });

    Route::get('mappa/{id}', 'App\Http\Controllers\ProjectController@mappa');
    Route::get('download/{id}', 'App\Http\Controllers\ProjectController@download');
});





/* Route::resource('projects', 'App\Http\Controllers\ProjectsController'); */

