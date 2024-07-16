<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.show', compact('client'));
    }

    
    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'telephone' => 'required|string|max:20',
        ]);

        Client::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'telephone' => $request->telephone,
        ]);

        return redirect()->route('clients.index')->with('success', 'Client créé avec succès.');
    }
    
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,'.$id,
            'telephone' => 'nullable|string|max:15',
        ]);

        $client = Client::findOrFail($id);
        $client->update($request->all());

        return redirect()->route('clients.index')->with('success', 'Client mis à jour avec succès.');
    }


    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès.');
    }
}
