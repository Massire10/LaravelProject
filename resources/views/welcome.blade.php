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
                        <router-link to="/ingredients" class="nav-link dropdown-toggle " id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Recettes</router-link>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <router-link class="dropdown-item" to="/ajout">Ajouter recettes</router-link>
                            <router-link class="dropdown-item" to="/">Liste des recettes</router-link>
                        <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/contact">Contact</router-link>
                    </li>
                    </ul>
                    <div v-if="true" class="form-inline my-2 my-lg-0">
                        <router-link to="/login">
                            <a class="text-white my-2 my-sm-0" onClick="logout()">Se déconnecter</a>
                        </router-link>
                    </div>
                </div>
            </nav>
            <div class="container">
                <router-view></router-view>
            </div>

        </div>
        <script type="text/javascript" >

            function logout (){
               this.$cookies.remove('token');
            }
        </script>
        <script src="{{ asset('js/app.js')}}"></script>
    </body>
</html>
