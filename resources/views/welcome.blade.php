{{-- <!DOCTYPE html>
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
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <!-- Lien About Us visible pour tous -->
                <li class="nav-item">
                    <a class="nav-link" href="/about-us"><i class="fas fa-info-circle"></i> About Us</a>
                </li>
                <!-- Lien Sign Up visible pour tous -->
                <li class="nav-item">
                    <a class="nav-link" href="/register"><i class="fas fa-user-plus"></i> Sign Up</a>
                </li>
                <!-- Lien Sign In visible pour tous -->
                <li class="nav-item">
                    <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i> Sign In</a>
                </li>
                <!-- Lien Logout visible pour les utilisateurs connectés (caché ici) -->
                <li class="nav-item" style="display: none;">
                    <a class="nav-link" href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </div>
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
        </ul>
    </div>


    <!-- Bootstrap JS et dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
 --}}
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
            color: #2F2F2F; /* Couleur du texte noir foncé pour les liens de navigation */
        }

        /* Changer la couleur des icônes en bleu */
        .navbar-custom .nav-link .fas {
            color: #007bff; /* Couleur bleue pour les icônes */
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
            margin-left: 50px; /* Largeur de la barre latérale */
            padding: 30px;
        }

        .image-container {
            display: flex;
            justify-content: center; /* Centrer l'image horizontalement */
            align-items: center; /* Centrer verticalement */
        }

        .image-container img {
            margin-right: 20px; /* Ajouter une marge à droite de l'image */
        }

        .text-container {
            display: flex;
            justify-content: flex-start; /* Aligner le texte à droite */
            align-items: center; /* Centrer verticalement */
            height: 100%; /* Utiliser toute la hauteur disponible */
        }

        .text-container p {
            margin-bottom: 0; /* Supprimer la marge en bas du paragraphe */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-phone"></i> +216 70 033 062</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mailto:support@yourmail.com"><i class="fas fa-envelope"></i> contact@data-era.co</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <!-- Lien About Us visible pour tous -->
                    <li class="nav-item">
                        <a class="nav-link" href="/about-us"><i class="fas fa-info-circle"></i> About Us</a>
                    </li>
                    <!-- Lien Sign Up visible pour tous -->
                    <li class="nav-item">
                        <a class="nav-link" href="/register"><i class="fas fa-user-plus"></i> Sign Up</a>
                    </li>
                    <!-- Lien Sign In visible pour tous -->
                    <li class="nav-item">
                        <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i> Sign In</a>
                    </li>
                    <!-- Lien Logout visible pour les utilisateurs connectés (caché ici) -->
                    <li class="nav-item" style="display: none;">
                        <a class="nav-link" href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="content container">
        <div class="row">
            <div class="col-md-6 image-container">
                <img src="{{ asset('images/financialservice.gif') }}" alt="Financial Service" class="img-fluid" style="max-width: 100%; height: auto;">
            </div>
            <div class="col-md-6 text-container">
                <p>Garantir une bonne gestion de vos factures</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS et dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
