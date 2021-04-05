<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    </head>
    <body class="antialiased">
        <div id="app">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <router-link class="nav-link" to="/home">Accueil<span class="sr-only">(current)</span></router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/recettes">Recettes</router-link>
                    </li>
                    <li class="nav-item dropdown">
                        <router-link to="/ingredients" class="nav-link dropdown-toggle disabled" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Recettes</router-link>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <router-link class="dropdown-item" to="/">Recettes</router-link>
                            <router-link class="dropdown-item" to="/">Recettes</router-link>
                        <div class="dropdown-divider"></div>
                        <router-link class="dropdown-item" to="/">Recettes</router-link>
                        </div>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/contact" tabindex="-1" aria-disabled="true">Contact</router-link>
                    </li>
                    </ul>
                    <!-- <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form> -->
                </div>
            </nav>
            <div class="container">
                <router-view></router-view>
            </div>
            
        </div>
        <script src="{{ asset('js/app.js')}}"></script>
    </body>
</html>
