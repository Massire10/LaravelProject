<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                    <router-link to="/ingredients" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Recettes</router-link>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <router-link class="dropdown-item" to="/">Recettes</router-link>
                        <router-link class="dropdown-item" to="/">Recettes</router-link>
                    <div class="dropdown-divider"></div>
                    <router-link class="dropdown-item" to="/">Recettes</router-link>
                    </div>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link disabled" to="/" tabindex="-1" aria-disabled="true">Recettes</router-link>
                </li>
                </ul>
                <!-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form> -->
            </div>
        </nav>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style lang="scss" scoped>

</style>