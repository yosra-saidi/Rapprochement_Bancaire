<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Facture;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;
use App\Imports\FactureImport;
class FactureController extends Controller
{
    // Méthodes CRUD

    // Afficher toutes les factures
    public function index()
    {
        $factures = Facture::all();
        return view('factures.index', compact('factures'));
    }

    // Afficher le formulaire de création d'une nouvelle facture
    public function create()
    {
        return view('factures.create');
    }

    // // Enregistrer une nouvelle facture
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'numero_facture' => 'required|string|max:255',
    //         'montant' => 'required|numeric',
    //     ]);

    //     Facture::create([
    //         'numero_facture' => $request->numero_facture,
    //         'montant' => $request->montant,
    //     ]);

    //     return redirect()->route('factures.index')->with('success', 'Facture créée avec succès.');
    // }

    // Afficher une facture spécifique
    public function show($id)
    {
        $facture = Facture::findOrFail($id);
        return view('factures.show', compact('facture'));
    }

    // Afficher le formulaire d'édition d'une facture
    public function edit($id)
    {
        $facture = Facture::findOrFail($id);
        return view('factures.edit', compact('facture'));
    }

    // Mettre à jour une facture
    public function update(Request $request, $id)
    {
        $request->validate([
            'numero_facture' => 'required|string|max:255',
            'montant' => 'required|numeric',
        ]);

        $facture = Facture::findOrFail($id);
        $facture->update([
            'numero_facture' => $request->numero_facture,
            'montant' => $request->montant,
        ]);

        return redirect()->route('factures.index')->with('success', 'Facture mise à jour avec succès.');
    }

    // Supprimer une facture
    public function destroy($id)
    {
        $facture = Facture::findOrFail($id);
        $facture->delete();

        return redirect()->route('factures.index')->with('success', 'Facture supprimée avec succès.');
    }

    // Méthode de rapprochement bancaire
    public function rapprochementBancaire()
    {
        // Extraction des montants des factures depuis Excel
        $factures = Excel::toCollection(new FactureImport, 'factures.xlsx')->first();

        // Récupération des montants versés par les clients
        $montantsVerses = Client::pluck('montant_versé', 'id');

        // Initialisation du résultat
        $result = "Succès! Toutes les factures correspondent aux montants versés.";

        // Comparaison des montants
        foreach ($factures as $facture) {
            if (!$montantsVerses->has($facture['id'])) {
                $result = "La facture {$facture['id']} n'a pas de montant correspondant.";
                break;
            }

            if ($facture['montant'] != $montantsVerses[$facture['id']]) {
                $result = "La facture {$facture['id']} n'a pas de correspondance avec le montant versé.";
                break;
            }
        }

        // Retour du résultat
        return $result;
    }

    public function rapprochement(Request $request)
    {
        // Appel de la méthode rapprochementBancaire pour obtenir le résultat
        $result = $this->rapprochementBancaire();

        // Retour de la réponse JSON
        return response()->json([
            'success' => true,
            'message' => $result
        ]);
    }
    public function store(Request $request)
    {
        $facture = new Facture();
        $facture->numero_facture = $request->numero_facture;
        $facture->montant = $request->montant;
        $facture->client_id = $request->client_id;
        $facture->status = $request->status;
        $facture->date = $request->date; // Assurez-vous que $request->date contient une valeur valide
    
        $facture->save();
    
        return response()->json($facture, 201);
    }

    
}
