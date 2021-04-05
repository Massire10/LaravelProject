<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;


class RecipesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
            'title' => 'Allumettes au foie gras',
            'content' => 'Un élégant petit canapé composé d\'une couche croustillante de pâte sablée au sésame et d\'une couche de foie gra',
            'ingredients' => "pâte sablée au sésame, couche de foie gra",
            'url' => 'https://cuisine-facile.com/images/vignettes_150/438.jpg',
            'tags' => '',
            'status' => 'disponible',
            'date' => Carbon::now(),
            'author_id' => 4,
        ]);
        DB::table('recipes')->insert([
            'title' => 'Artichauts poivrade',
            'content' => "Les artichauts \"poivrade\" ce sont des petits artichauts violets qu'on mange crus, plutôt en salade. On choisi exprès les artichauts les plus petits, car ils seront les plus tendres et pratiquement sans \"foin\". Dans cette recette, ils sont en salade avec des herbes, de l'oignon nouveau, des copeaux...",
            'ingredients' => "petits artichauts violets, artichauts,  herbes, l'oignon nouveau, des copeaux",
            'url' => 'https://cuisine-facile.com/images/vignettes_150/697.jpg',
            'tags' => '',
            'status' => 'disponible',
            'date' => Carbon::now(),
            'author_id' => 1,
        ]);
        DB::table('recipes')->insert([
            'title' => 'Fonds d\'artichauts forestiers',
            'content' => "C'est une recette pas très compliquée, mais qui demande un peu de travail : il s'agit d'un fond d'artichaut sur lequel est posé une couche de duxelle de champignons, une couche de petits lardons grillés, un œuf mollet et le tout nappé d'une sauce crème. Tout peut être fait à l'avance (la...",
            'ingredients' => "fond d'artichaut, une couche de duxelle de champignons, une couche de petits lardons grillés, un œuf mollet et le tout nappé d'une sauce crème",
            'url' => 'https://cuisine-facile.com/images/vignettes_150/74.jpg',
            'tags' => '',
            'status' => 'disponible',
            'date' => Carbon::now(),
            'author_id' => 3,
        ]);
        DB::table('recipes')->insert([
            'title' => 'Gougères',
            'content' => 'Ce sont petits choux au fromage, parfois (comme ici) on y ajoute des petits morceaux de jambon.',
            'ingredients' => "choux au fromage, des petits morceaux de jambon",
            'url' => 'https://cuisine-facile.com/images/vignettes_150/272.jpg',
            'tags' => '',
            'status' => 'disponible',
            'date' => Carbon::now(),
            'author_id' => 2,
        ]);
        DB::table('recipes')->insert([
            'title' => 'Mini toasts fromage et moutarde',
            'content' => 'Pour un apéritif qui sorte un peu de l\'ordinaire, je vous propose ces petits toasts au fromage et à la moutarde, dans une recette à la minute qui peut facilement se réaliser au dernier moment.',
            'ingredients' => 'apéritif qui sorte un peu de l\'ordinaire',
            'url' => 'https://cuisine-facile.com/images/vignettes_150/1102.jpg',
            'tags' => '',
            'status' => 'disponible',
            'date' => Carbon::now(),
            'author_id' => 4,
        ]);
        DB::table('recipes')->insert([
            'title' => 'Oeuf Arsène',
            'content' => "L’œuf Arsène est la version plus rustique (quoique), et surtout plus Comtoise, de l'oeuf Benedict, l'indispensable élément du petit déjeuner des romans de Ian Fleming. Et, vous l'aurez compris, un clin d’œil à son personnage principal, James Bond.",
            'ingredients' => 'oeuf Benedict',
            'url' => 'https://cuisine-facile.com/images/vignettes_150/950.jpg',
            'tags' => '',
            'status' => 'disponible',
            'date' => Carbon::now(),
            'author_id' => 3,
        ]);
        DB::table('recipes')->insert([
            'title' => 'Salade croquante radis et carottes',
            'content' => 'Simple et rapide, cette recette d\'une salade fraiche et très croquante est idéale pour le début de printemps',
            'ingredients' => 'salade fraiche',
            'url' => 'https://cuisine-facile.com/images/vignettes_150/1099.jpg',
            'tags' => '',
            'status' => 'disponible',
            'date' => Carbon::now(),
            'author_id' => 2,  
        ]);
        DB::table('recipes')->insert([
            'title' => 'Bouillon léger aux brocoli',
            'content' => 'Simple, léger, mais avec beaucoup de gout, voici un délicat bouillon de légumes aux brocoli',
            'ingredients' => 'salade fraiche',
            'url' => 'https://cuisine-facile.com/images/vignettes_150/743.jpg',
            'tags' => '',
            'status' => 'disponible',
            'date' => Carbon::now(),
            'author_id' => 4,  
        ]);
    }
}
