<?php

// app/Http/Controllers/EntrepriseController.php
namespace App\Http\Controllers;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    /**
     * Affiche la liste des entreprises.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entreprises = Entreprise::all();
        return view('entreprises.index', compact('entreprises'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle entreprise.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entreprises.create');
    }

    /**
     * Enregistre une nouvelle entreprise dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'telephone' => 'nullable|string|max:20',
        ]);

        
        $entreprise = Entreprise::create($request->all());

        return response()->json(['success' => true, 'data' => $entreprise], 201);
    }



    /**
     * Affiche les détails d'une entreprise spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entreprise = Entreprise::findOrFail($id);
        return view('entreprises.show', compact('entreprise'));
    }

    /**
     * Affiche le formulaire de modification d'une entreprise.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entreprise = Entreprise::findOrFail($id);
        return view('entreprises.edit', compact('entreprise'));
    }

    /**
     * Met à jour une entreprise spécifique dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'telephone' => 'nullable|string|max:20',
        ]);

        $entreprise = Entreprise::findOrFail($id);
        $entreprise->update($validatedData);

        return redirect()->route('entreprises.index')
                         ->with('success', 'Entreprise mise à jour avec succès.');
    }

    /**
     * Supprime une entreprise spécifique de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entreprise = Entreprise::findOrFail($id);
        $entreprise->delete();

        return redirect()->route('entreprises.index')
                         ->with('success', 'Entreprise supprimée avec succès.');
    }
}
