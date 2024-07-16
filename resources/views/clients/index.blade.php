<x-app-layout>
    {{-- <div class="p-6 text-gray-900">
        {{ __('Welcome, ') }} {{ Auth::user()->name }}
    </div> --}}
</x-app-layout>
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
        .table-wrapper {
            width: 100%;
            max-width: 800px; /* Ajustez cette valeur en fonction de vos besoins */
        }
        .btn-dark-gray {
            background-color: #343a40; /* Gris foncé */
            color: white;
            border: none;
        }
        .btn-dark-gray:hover {
            background-color: #23272b; /* Gris encore plus foncé pour le survol */
        }
        .table-factures th {
            background-color: #343a40; /* Gris foncé pour les en-têtes de tableau */
            color: white; /* Texte blanc pour les en-têtes de tableau */
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
        <li class="nav-item">
            <a class="nav-link" href="{{ route('rapprochement.index') }}"><i class="fas fa-university"></i> Rapprochement Bancaire</a>
        </li>
    </ul>
</div>

<!-- Contenu principal -->
<div class="content">
    <div class="table-wrapper">
        <table class="table table-factures">
            <thead>
                <tr>
                    <th>Id de client</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->nom }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->telephone }}</td>
                        <td class="actions">
                            <a href="{{ route('clients.show', $client->id) }}" class="btn btn-info" title="Voir">
                                &#128065;
                            </a>
                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning" title="Éditer">
                                &#9998;
                            </a>
                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;" title="Supprimer">
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
        <a href="{{ route('clients.create') }}" class="btn btn-dark-gray" title="Ajouter Facture">
            <i class="fas fa-plus"></i> Ajouter Client
        </a>
    </div>
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
