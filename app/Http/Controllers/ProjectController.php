<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'mimes' => "Il file inserito non è del formato corretto!",
        ];

        $rules = [
            'title' => 'required|string|max:80',
            'url' => 'required|url|max:255',
            'file' => 'required|file|mimes:xls,xlsx,pdf',
            'note' => 'nullable|string|max:255',
        ];

        $attributeNames = [
            'title' => 'titolo',
            'url' => 'url',
            'file'=> 'file',
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
            $project = new Project($request->all());
            $project->title = $request->title;
            $project->url_mappa = $request->url;
            $project->file_path = Storage::disk('public')->put('files', $request->file('file'));
            $project->note = $request->note;
            $project->created_by = $userId;
            $project->save();
        }

        return redirect()->route('dashboard')->with('message', 'Progetto creato con successo!');

    }

    public function destroy(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('dashboard')->with('message','Progetto eliminato con successo!');
    }
}
