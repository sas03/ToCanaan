<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtablissementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etablissements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_uai', 255)->nullable();
            $table->string('type', 255)->nullable();
            $table->string('nom', 255)->nullable();
            $table->string('sigle', 255)->nullable();
            $table->string('statut', 255)->nullable();
            $table->string('universite')->nullable();
            $table->string('adresse', 255)->nullable();
            $table->string('code_postal', 255)->nullable();
            $table->string('commune', 255)->nullable();
            $table->string('telephone', 255)->nullable();
            $table->string('departement', 255)->nullable();
            $table->string('academie', 255)->nullable();
            $table->string('region', 255)->nullable();
            $table->string('lien_onisep', 255)->nullable();
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
        Schema::dropIfExists('etablissements');
    }
}
