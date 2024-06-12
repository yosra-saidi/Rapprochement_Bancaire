{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <a class="navbar-brand" href="#">Welcome {{ Auth::user() ? Auth::user()->name : '' }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link nav-link-about-us" href="/about-us">About Us</a>
                </li>
                @guest <!-- Vérifie si l'utilisateur n'est pas authentifié -->
                    <li class="nav-item">
                        <a class="nav-link nav-link-register" href="/register">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-login" href="/login">Login</a>
                    </li>
             @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                @endguest 

            </ul>
        </div>
    </nav>

    <!-- Bootstrap JS and dependencies -->
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
     <title>Navbar with Sidebar</title>
     <!-- Bootstrap CSS -->
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
     <!-- Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
     <!-- Custom CSS -->
     <link href="{{ asset('css/style.css') }}" rel="stylesheet">
     <style>
         /* Ajoutez vos styles CSS personnalisés ici */
         .navbar-custom {
             background-color: #007bff; /* Couleur de fond bleu ciel pour le navbar */
         }
         .navbar-custom .navbar-brand {
             color: #ffffff; /* Couleur du texte blanc pour la marque */
         }
         .navbar-custom .nav-link {
             color: #ffffff; /* Couleur du texte blanc pour les liens de navigation */
         }
     </style>
 </head>
 <body>
     <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
         
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav ml-auto">
                 <li class="nav-item">
                     <a class="nav-link" href="/about-us"><i class="fas fa-info-circle"></i> About Us</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="/register"><i class="fas fa-sign-in-alt"></i> Sign In</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i> Login</a>
                 </li>
             </ul>
         </div>
     </nav>
 
   
    <!-- Barre latérale -->
<div class="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('factures.index') }}"><i class="fas fa-file-invoice"></i> Factures</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-user"></i> Clients</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-cog"></i> Paramètres</a>
        </li>
    </ul>
</div>

 
     <!-- Bootstrap JS and dependencies -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 </body>
 </html>
 