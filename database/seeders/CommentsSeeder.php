<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'content' => 'délicieux',
            'author_id' => 4,
            'recipe_id' => 2,
            'date' => Carbon::now(),
        ]);
        DB::table('comments')->insert([
            'content' => 'Génial',
            'author_id' => 3,
            'recipe_id' => 5,
            'date' => Carbon::now(),
        ]);
        DB::table('comments')->insert([
            'content' => 'Magnifique',
            'author_id' => 1,
            'recipe_id' => 6,
            'date' => Carbon::now(),
        ]);
        DB::table('comments')->insert([
            'content' => 'Superbe',
            'author_id' => 2,
            'recipe_id' => 7,
            'date' => Carbon::now(),
        ]);
        DB::table('comments')->insert([
            'content' => 'Superbe',
            'author_id' => 2,
            'recipe_id' => 8,
            'date' => Carbon::now(),
        ]);
        DB::table('comments')->insert([
            'content' => 'Trés bien préparé',
            'author_id' => 1,
            'recipe_id' => 4,
            'date' => Carbon::now(),
        ]);
        DB::table('comments')->insert([
            'content' => 'Trés bien préparé',
            'author_id' => 4,
            'recipe_id' => 7,
            'date' => Carbon::now(),
        ]);
    }
}
