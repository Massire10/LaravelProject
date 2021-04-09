<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Frameworks utilisés
    Laravel 8 et Vuejs 2.5.17
    
## Cloner le projet
    git clone https://github.com/Massire10/LaravelProject.git
    cd LaravelProject

## Installer les dépendances pour composer
    composer install

## Céer un fichier database.sqlite dans le dossier app/database du projet
    Configurer l'accés dans un fichier .env
    
## Migreer la base de données
    php artisan migrate

## Lancer les seed
    php artisan make:seed --class=UserSeeder
    php artisan make:seed --class=RecipesSeeder
    php artisan make:seed --class=CommentsSeeder

## Jwt
    php artisan jwt:secret

## Pour le front en vuejs
    npm install 
    npm run dev
    npm run watch

## Fonctionnalités du projet
* TP2 Complet
* Authentification (jwt)
* CRUD recettes
* CRUD commentaires
* CRUD contact
* Utilisation du Framework Vuejs
* Vuejs Navigation Guards
* Bootstrap

## Les plus

* Spatie Laravel Query Builder : <a href="https://github.com/spatie/laravel-query-builder" >lien</a>

    Ce package permet de filtrer, trier et inclure des relations éloquentes en fonction d'une demande
  

* Spatie Laravel Permission : <a href="https://github.com/spatie/laravel-permission" >lien</a>
* Spatie Laravel Fractal : <a href="https://github.com/spatie/laravel-fractal" >lien</a>


