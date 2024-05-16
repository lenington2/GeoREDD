<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function create(Request $request)
    {

        $messages = [
            'required' => 'Il campo :attribute è vuoto!',
            'in' => 'Il campo :attribute non è del tipo corretto!',
            'string' => 'Il campo :attribute non è una stringa!',
            'max' => 'Il campo :attribute inserito è più grande di :max caratteri!',
            'url' => 'Il campo :attribute deve essere di tipo url!',
            'integer' => 'Il campo :attribute non è un numero!',
            'numeric' => 'Il campo :attribute non è un numero!',
            'email' => 'Il campo :attribute non è un\'indirizzo email!',
            'email.unique' =>
                'La e-mail inserita è già registrata con un altro cliente!',
            'required_if' => 'Il campo :attribute è obbligatorio',
        ];

        $rules = [
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:100',
            'note' => 'nullable|string',
        ];

        $attributeNames = [
            'title' => 'titolo',
            'url' => 'url',
            'note' => 'note',
        ];

        $validator = Validator::make(
            $request->all(),
            $rules,
            $messages,
            $attributeNames
        );

        if ($validator->fails()) {
            return redirect()->route('new-project')
                ->withErrors($validator)
                ->withInput();
        } else {
            $userId = Auth::id();

            Project::create([
                'title' => $request->title,
                'url_mappa' => $request->url,
                'note' => $request->note,
                'created_by' => $userId,
                'active' => '1',
            ]);
        }

        return redirect()->route('dashboard')->with('message', 'Progetto creato con successo!');

    }
}
