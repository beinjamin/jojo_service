<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("prenom");
            $table->date("dateNaissance");
            $table->string("lieuNaissance");
            $table->char("sexe");
            $table->string("ville");
            $table->string("nationalie");
            $table->date("pays");
            $table->string("adresse");
            $table->string("telephone1");
            $table->string("telephone2")->nullable();
            $table->string("pieceIdentite");
            $table->string("noPieceIdentite");
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
        Schema::dropIfExists('clients');
    }
}
