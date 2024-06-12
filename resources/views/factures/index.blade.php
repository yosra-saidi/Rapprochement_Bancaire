@extends('layouts.app')

@section('content')
    <h1 class="title">Liste des Factures</h1>
    <table class="table-factures">
        <thead>
            <tr>
                <th>Numéro de Facture</th>
                <th>Montant</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($factures as $facture)
                <tr>
                    <td>{{ $facture->numero_facture }}</td>
                    <td>{{ $facture->montant }}</td>
                    <td class="actions">
                        <a href="{{ route('factures.show', $facture->id) }}" class="btn btn-info" title="Voir">
                            &#128065;
                        </a>
                        <a href="{{ route('factures.edit', $facture->id) }}" class="btn btn-warning" title="Éditer">
                            &#9998;
                        </a>
                        <form action="{{ route('factures.destroy', $facture->id) }}" method="POST" style="display:inline;" title="Supprimer">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                &#128465;
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
     {{-- Formulaire pour télécharger une facture --}}
     {{-- <h2>Ajouter une nouvelle facture</h2>
     <form action="{{ route('factures.store') }}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="form-group">
             <label for="invoice_file">Télécharger la facture</label>
             <input type="file" class="form-control" id="invoice_file" name="invoice_file" required>
         </div>
         <button type="submit" class="btn btn-primary">Ajouter </button>
     </form>
 
     <div class="action-buttons">
         <a href="{{ route('factures.create') }}" class="btn btn-add-facture" title="Ajouter une Facture">
             Créer une Facture
         </a> --}}

    <div class="action-buttons">
        <a href="{{ route('factures.create') }}" class="btn btn-add-facture" title="Ajouter une Facture">
            Ajouter une Facture
        </a>
    </div>


    
@endsection
