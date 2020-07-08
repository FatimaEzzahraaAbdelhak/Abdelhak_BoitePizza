<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandeFormuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_formule', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('commande_id')->nullable();
            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade');

            $table->unsignedBigInteger('formule_id')->nullable();
            $table->foreign('formule_id')->references('id')->on('formules')->onDelete('cascade');

            $table->unique(['commande_id','formule_id']);
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
        Schema::dropIfExists('commande_formule');
    }
}
