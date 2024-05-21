<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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
            'email.unique' => 'L\'e-mail inserita è già registrata con un altro cliente!',
            'required_if' => 'Il campo :attribute è obbligatorio',
            'mimes' => 'Il file inserito non è del formato corretto!',
            'min' => 'La password deve essere di almeno 8 caratteri!'
        ];

        $this->rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,user',
        ];

        $this->attributeNames = [
            'name' => 'nome',
            'email' => 'email',
            'password' => 'password',
            'role' => 'ruolo',
        ];
    }
    public function create(Request $request)
    {
        // Validazione dei dati in ingresso
        $validator = Validator::make(
            $request->all(),
            $this->rules,
            $this->messages,
            $this->attributeNames
        );

        if ($validator->fails()) {
            return redirect()->route('new-user')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Creazione del nuovo utente
            $user = new User($request->all());
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->save();
            // Reindirizzamento con messaggio di successo
            return redirect()->route('dashboard')->with('message', 'Utente creato con successo!');
        }
    }

    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('dashboard')->with('message', 'Utente eliminato con successo!');
    }
}
