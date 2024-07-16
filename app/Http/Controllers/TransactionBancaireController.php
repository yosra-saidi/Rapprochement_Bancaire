<?php

namespace App\Http\Controllers;

use App\Models\TransactionBancaire;
use App\Models\Client; // Assurez-vous d'importer le modèle Client
use Illuminate\Http\Request;

class TransactionBancaireController extends Controller
{
    public function show($id)
    {
        $transaction_bancaire = TransactionBancaire::findOrFail($id);
        return view('transactions.show', compact('transaction_bancaire'));
    }
    public function edit($id)
    {
        $transaction_bancaire = TransactionBancaire::findOrFail($id);
        $clients = Client::all();
        return view('transactions.edit', compact('transaction_bancaire', 'clients'));
    }
    
public function update(Request $request, $id)
{
    $request->validate([
        'montant' => 'required|numeric',
        'date_transaction' => 'required|date',
        'payeur' => 'required|exists:clients,id',
    ]);

    $transaction_bancaire = TransactionBancaire::findOrFail($id);
    $transaction_bancaire->update([
        'montant' => $request->montant,
        'date_transaction' => $request->date_transaction,
        'payeur' => $request->payeur,
    ]);

    return redirect()->route('transactions.index')->with('success', 'Transaction mise à jour avec succès.');
}


    public function index()
    {
        $transactions = TransactionBancaire::all();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
{
    $clients = Client::all();
    return view('transactions.create', compact('clients'));
}


    public function store(Request $request)
    {
        $request->validate([
            'montant' => 'required|numeric',
            'date_transaction' => 'required|date',
            'payeur' => 'required|string|max:255',
        ]);

        $transaction_bancaire = new TransactionBancaire();
        $transaction_bancaire->montant = $request->montant;
        $transaction_bancaire->date_transaction = $request->date_transaction;
        $transaction_bancaire->payeur = $request->payeur;
        $transaction_bancaire->save();

        return redirect()->route('transactions.index')->with('success', 'Transaction créée avec succès.');
    }

}
