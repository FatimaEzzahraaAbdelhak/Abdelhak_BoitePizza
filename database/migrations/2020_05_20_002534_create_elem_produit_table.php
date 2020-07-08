<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElemProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elem_produit', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('element_id')->nullable();
            $table->foreign('element_id')->references('id')->on('elements')->onDelete('cascade');

            $table->unsignedInteger('produit_id')->nullable();
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');

            $table->unique(['element_id','produit_id']);
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
        Schema::dropIfExists('elem_produit');
    }
}
