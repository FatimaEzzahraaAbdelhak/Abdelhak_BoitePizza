<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormuleProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formule_produit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('formule_id')->nullable();
            $table->foreign('formule_id')->references('id')->on('formules')->onDelete('cascade');

            $table->unsignedInteger('produit_id')->nullable();
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');

            $table->unique(['formule_id','produit_id']);
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
        Schema::dropIfExists('formule_produit');
    }
}
