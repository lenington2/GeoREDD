<?php

use Illuminate\Support\Facades\Route;
use illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\User;
use App\Models\Authorization;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SpecsController;
use App\Http\Controllers\AuthorizationController;


Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('auth.login')->with('title', 'GeoREDD - Login');
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $role = Auth::user()->role;
        $authenticatedUser = Auth::user();
        if ($role == 'admin') {
            $projects = Project::join('users', 'projects.created_by', '=', 'users.id')
                ->select('projects.*', 'users.name as creator_name')
                ->get();
            $users = User::where('id', '!=', $authenticatedUser->id)->get();

            return view('dashboard', ['projects' => $projects, 'users' => $users]);
        } else {
            $projects = Project::join('authorizations', 'projects.idproject', '=', 'authorizations.project_id')
                ->where('authorizations.user_id', '=', $authenticatedUser->id)
                ->where('authorizations.is_authorized', '=', 1)
                ->join('users', 'projects.created_by', '=', 'users.id')
                ->select('projects.*', 'users.name as creator_name')
                ->get();

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

        //eliminazione*
        Route::delete('projects/{id}/destroy', 'App\Http\Controllers\ProjectController@destroy');
        Route::delete('users/{id}/destroy', 'App\Http\Controllers\UserController@destroy');

        //autorizzazione
        Route::get('/authorization/{id}', function ($id) {
            $projects = Project::join('users', 'projects.created_by', '=', 'users.id')
                ->select('projects.*', 'users.name as creator_name')
                ->get();
            $user = User::findOrFail($id);
            $auth = Authorization::where('user_id', $id)->get();
            if($user->role != 'admin') {
                return view('auth-user', ['projects' => $projects, 'user' => $user, 'auth' => $auth]);
            }else{
                return redirect()->route('dashboard')->with('error', 'L\'utente selezionato è un admin.');
            }
            
        })->name('auth-user');

        Route::post('/authorization/create', [AuthorizationController::class, 'create']);


    });

    Route::get('/specs', [SpecsController::class, 'show'])->name('specs.show');

    //accetta termini e privacy
    Route::post('/accept-terms', [UserController::class, 'acceptTerms'])->name('accept-terms');

    //visualizzazione
    Route::get('mappa/{id}', 'App\Http\Controllers\ProjectController@mappa');

    //download
    Route::get('download/{id}', 'App\Http\Controllers\ProjectController@download');
});







/* Route::resource('projects', 'App\Http\Controllers\ProjectsController'); */

