<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;

class ProjectController extends Controller
{

    // Dichiarazione delle variabili come proprietà della classe
    protected $messages;
    protected $rules;
    protected $attributeNames;

    // Costruttore per inizializzare le variabili
    public function __construct()
    {
        $this->messages = [
            'required' => 'Il campo :attribute è vuoto!',
            'in' => 'Il campo :attribute non è del tipo corretto!',
            'string' => 'Il campo :attribute non è una stringa!',
            'max' => 'Il campo :attribute inserito è più grande di :max caratteri!',
            'url' => 'Il campo :attribute deve essere di tipo url!',
            'integer' => 'Il campo :attribute non è un numero!',
            'numeric' => 'Il campo :attribute non è un numero!',
            'email' => 'Il campo :attribute non è un\'indirizzo email!',
            'email.unique' => 'La e-mail inserita è già registrata con un altro cliente!',
            'required_if' => 'Il campo :attribute è obbligatorio',
            'mimes' => 'Il file inserito non è del formato corretto!',
        ];

        $this->rules = [
            'title' => 'required|string|max:80',
            'url' => 'required|url|max:255',
            'file' => 'nullable|file|mimes:xls,xlsx,pdf',
            'note' => 'nullable|string|max:255',
        ];

        $this->attributeNames = [
            'title' => 'titolo',
            'url' => 'url',
            'file' => 'file',
            'note' => 'note',
        ];
    }
    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            $this->rules,
            $this->messages,
            $this->attributeNames
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

        return redirect()->route('dashboard')->with('message', 'Progetto eliminato con successo!');
    }

    public function mappa(Request $request, $id)
    {
        $project = Project::findOrFail($id);


        return view('dashboard_mappa', ['projects' => $project]);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            $this->rules,
            $this->messages,
            $this->attributeNames
        );

        if ($validator->fails()) {
            return redirect()->route('edit-project', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        } else {
            $project = Project::findOrFail($id);

            $project->title = $request->input('title');
            $project->url_mappa = $request->input('url');

            // Controlla se l'utente ha selezionato di eliminare il file attuale
            if ($request->has('delete_file') && $request->input('delete_file') == 1) {
                // Elimina il file attuale
                if ($project->file_path) {
                    Storage::disk('public')->delete($project->file_path);
                    $project->file_path = null; // Rimuovi il riferimento al file
                }
            }
            if ($request->hasFile('file')) {
                // Carica un nuovo file
                $project->file_path = Storage::disk('public')->put('files', $request->file('file'));
            }

            $project->note = $request->input('note');
            $project->updated_by = $request->user()->id;
            $project->save();

            return redirect()->route('dashboard')->with('message', 'Progetto aggiornato con successo!');
        }
    }

    public function download(Request $request, $id)
{
    $project = Project::findOrFail($id);
    $path = $project->file_path;
    
    if (Storage::exists('public/'.$path)) {
        return Storage::download('public/'.$path);
    }
   
    return redirect()->back()->with('error', 'Il file non esiste.');
}


}
