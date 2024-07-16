{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
<x-app-layout>
                <div class="p-6 text-gray-900">
                    {{ __('Welcome, ') }} {{ Auth::user()->name }}
                </div>
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
        /* Styles pour le navbar personnalisé */
        .navbar-custom {
            /* Fond transparent pour le navbar */
        }
        .navbar-custom .navbar-brand {
            color: #000000; /* Couleur du texte noir pour la marque */
        }
        .navbar-custom .nav-link {
            color: #000000; /* Couleur du texte noir pour les liens de navigation */
        }

        /* Styles pour la barre latérale */
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

        /* Contenu principal avec marge pour éviter le chevauchement avec la barre latérale */
        .content {
            margin-left: 250px; /* Largeur de la barre latérale */
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
    </nav>

    <!-- Barre latérale -->
    <div class="sidebar">
        <ul class="nav flex-column">
            <!-- Lien Gestion des Factures -->
            <li class="nav-item">
                <a class="nav-link active" href="/factures"><i class="fas fa-file-invoice"></i> Gestion des Factures</a>
            </li>
            <!-- Lien Gestion des Clients -->
            <li class="nav-item">
                <a class="nav-link" href="/clients"><i class="fas fa-users"></i> Gestion des Clients</a>
            </li>
            <!-- Lien Gestion des Transactions -->
            <li class="nav-item">
                <a class="nav-link" href="/transactions"><i class="fas fa-cogs"></i> Gestion des Transactions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('rapprochement.index') }}"><i class="fas fa-university"></i> Rapprochement Bancaire</a>
            </li>
        </ul>
    </div>


    <!-- Bootstrap JS et dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
