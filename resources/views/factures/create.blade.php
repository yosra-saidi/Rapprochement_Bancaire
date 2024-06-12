@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Créer une nouvelle facture</h1>
        <form action="{{ route('factures.store') }}" method="POST">
            @csrf
            <label for="numero_facture">Numéro de la facture :</label>
            <input type="text" name="numero_facture" id="numero_facture" required>
            <label for="montant">Montant :</label>
            <input type="text" name="montant" id="montant" required>
            <button type="submit">Ajouter</button>
        </form>
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/create-facture.css') }}">
@endsection