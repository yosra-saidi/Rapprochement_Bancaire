{{-- @extends('layouts.app')

@section('content')
    <h1>Facture {{ $facture->numero_facture }}</h1>
    <p>Montant : {{ $facture->montant }}</p>

    <table class="table-factures">
        <thead>
            <tr>
                <th>Numéro de Facture</th>
                <th>Montant</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $facture->numero_facture }}</td>
                <td>{{ $facture->montant }}</td>
                <td class="actions">
                    <a href="{{ route('factures.edit', $facture->id) }}" class="btn btn-warning" title="Éditer">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('factures.destroy', $facture->id) }}" method="POST" style="display:inline;" title="Supprimer">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                    <a href="{{ route('factures.show', $facture->id) }}" class="btn btn-info" title="Voir">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection --}}
