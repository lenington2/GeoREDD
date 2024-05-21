<?php

use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Models\User;
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
            $users = User::all();
            return view('dashboard', ['projects' => $projects, 'users'=> $users]);
        } else {
            return view('dashboardUser', ['projects' => $projects]);
        }
    })->name('dashboard');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        //creazione
        Route::get('/new-project', function () {
            return view('new-project');
        })->name('new-project');

        Route::get('/new-user', function () {
            return view('new-user');
        })->name('new-user');

        Route::post('projects/create', 'App\Http\Controllers\ProjectController@create');
        Route::post('users/create', 'App\Http\Controllers\UserController@create');

        //update
        Route::get('/edit-project/{id}', function ($id) {
            $project = Project::findOrFail($id);
            return view('edit-project', ['project' => $project]);
        })->name('edit-project');

        Route::post('projects/update/{id}', 'App\Http\Controllers\ProjectController@update');
        /* Route::post('users/update/{id}', 'App\Http\Controllers\UserController@update'); */

        //eliminazione
        Route::delete('projects/{id}/destroy', 'App\Http\Controllers\ProjectController@destroy');
        Route::delete('users/{id}/destroy', 'App\Http\Controllers\ProjectController@destroy');

       
    });

    //visualizzazione
    Route::get('mappa/{id}', 'App\Http\Controllers\ProjectController@mappa');

    //download
    Route::get('download/{id}', 'App\Http\Controllers\ProjectController@download');
});





/* Route::resource('projects', 'App\Http\Controllers\ProjectsController'); */

