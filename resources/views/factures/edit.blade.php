@extends('layouts.app')

@section('content')
    <h1>Editer la facture {{ $facture->numero_facture }}</h1>
    <form action="{{ route('factures.update', $facture->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="numero_facture">Numéro de la facture :</label>
        <input type="text" name="numero_facture" id="numero_facture" value="{{ $facture->numero_facture }}" required>
        <label for="montant">Montant :</label>
        <input type="text" name="montant" id="montant" value="{{ $facture->montant }}" required>
        <button type="submit">Mettre à jour</button>
    </form>
@endsection
