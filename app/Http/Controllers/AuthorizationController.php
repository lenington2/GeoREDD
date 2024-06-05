<?php

namespace App\Http\Controllers;

use App\Models\authorization;
use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    public function create(Request $request)
    {
        $user_id = $request->input('user_id');
        $project_ids = $request->input('projects');
        foreach ($project_ids as $project_id => $is_authorized) {
            authorization::updateOrCreate(
                ['user_id' => $user_id, 'project_id' => $project_id],
                ['is_authorized' => $is_authorized]
            );
        }
        return redirect()->route('dashboard')->with('message', 'Autorizzazioni aggiornate con successo.');
    }
}
