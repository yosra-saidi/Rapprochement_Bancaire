@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="form-container">
            <h1>Editer la facture {{ $facture->numero_facture }}</h1>
            <form action="{{ route('factures.update', $facture->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="numero_facture">Numéro de la facture :</label>
                    <input type="text" name="numero_facture" id="numero_facture" value="{{ $facture->numero_facture }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="montant">Montant :</label>
                    <input type="text" name="montant" id="montant" value="{{ $facture->montant }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="client_id">client_id</label>
                    <input type="text" name="montant" id="montant" value="{{ $facture->client_id }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="status">Statut</label>
                    <input type="text" id="status" name="status" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </form>
        </div>
    </div>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome page</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        .navbar-custom {
            /* Fond transparent pour le navbar */
        }
        .navbar-custom .navbar-brand {
            color: #000000; /* Couleur du texte noir pour la marque */
        }
        .navbar-custom .nav-link {
            color: #000000; /* Couleur du texte noir pour les liens de navigation */
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #343a40; /* Couleur de fond gris foncé pour la barre latérale */
            padding-top: 50px; /* Ajustement pour le contenu sous le navbar */
        }
        .sidebar .nav-link {
            color: #ffffff; /* Couleur du texte blanc pour les liens de la barre latérale */
        }
        .sidebar .nav-link.active {
            font-weight: bold; /* Style pour l'élément de lien actif */
        }
        .content {
            margin-left: 250px; /* Largeur de la barre latérale */
            padding: 20px;
            display: flex;
            justify-content: center; /* Centre le contenu horizontalement */
            align-items: center; /* Centre le contenu verticalement */
            min-height: 100vh; /* Assure que le contenu prend toute la hauteur de la vue */
        }
        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            max-width: 600px; /* Ajustez cette valeur en fonction de vos besoins */
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<!-- Barre latérale -->
<div class="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('factures.index') }}"><i class="fas fa-file-invoice"></i> Gestion des Factures</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/clients"><i class="fas fa-users"></i> Gestion des Clients</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/transactions"><i class="fas fa-cogs"></i> Gestion des Transactions</a>
        </li>
    </ul>
</div>

<!-- Bootstrap JS et dépendances -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Script pour charger dynamiquement le contenu -->
<script>
    function loadContent(section) {
        $.ajax({
            url: `/${section}`,
            method: 'GET',
            success: function(data) {
                $('#content-area').html(data);
            },
            error: function() {
                alert('Error loading content');
            }
        });
    }
</script>

</body>
</html>
