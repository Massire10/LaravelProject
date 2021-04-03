<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesRecepesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes_recepes', function (Blueprint $table) {
            $table->index(['recipe_id1', 'recipe_id2']);
            $table->unsignedInteger('recipe_id1');
            $table->foreign('recipe_id1')->references('id')->on('recipes')->onDelete('cascade');
            $table->unsignedBigInteger('recipe_id2');
            $table->foreign('recipe_id2')->references('id')->on('recipes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes_recepes');
    }
}
