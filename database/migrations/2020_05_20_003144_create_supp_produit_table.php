<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supp_produit', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('supplement_id')->nullable();
            $table->foreign('supplement_id')->references('id')->on('supplements')->onDelete('cascade');

            $table->unsignedInteger('produit_id')->nullable();
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');

            $table->unique(['supplement_id','produit_id']);
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
        Schema::dropIfExists('supp_produit');
    }
}
