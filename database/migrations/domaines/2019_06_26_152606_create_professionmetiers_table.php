<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionmetiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionmetiers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('avanture_id')->unsigned();
            $table->foreign('avanture_id')
                  ->references('id')->on('avantures')
                  ->onDelete('cascade');
            $table->integer('chauffeur_id')->unsigned();
            $table->foreign('chauffeur_id')
                  ->references('id')->on('chauffeurs')
                  ->onDelete('cascade');
            $table->integer('sciience_id')->unsigned();
            $table->foreign('sciience_id')
                  ->references('id')->on('sciiences')
                  ->onDelete('cascade');
            $table->integer('journaliste_id')->unsigned();
            $table->foreign('journaliste_id')
                  ->references('id')->on('journalistes')
                  ->onDelete('cascade');
            $table->integer('artiste_id')->unsigned();
            $table->foreign('artiste_id')
                  ->references('id')->on('artistes')
                  ->onDelete('cascade');
            $table->integer('legisllation_id')->unsigned();
            $table->foreign('legisllation_id')
                  ->references('id')->on('legisllations')
                  ->onDelete('cascade');
            $table->integer('aniimaux_id')->unsigned();
            $table->foreign('aniimaux_id')
                  ->references('id')->on('aniimauxes')
                  ->onDelete('cascade');
            $table->integer('enssseignement_id')->unsigned();
            $table->foreign('enssseignement_id')
                  ->references('id')->on('enssseignements')
                  ->onDelete('cascade');
            $table->integer('securiite_id')->unsigned();
            $table->foreign('securiite_id')
                  ->references('id')->on('securiites')
                  ->onDelete('cascade');
            $table->integer('conseille_id')->unsigned();
            $table->foreign('conseille_id')
                  ->references('id')->on('conseilles')
                  ->onDelete('cascade');
            $table->integer('protravailext_id')->unsigned();
            $table->foreign('protravailext_id')
                  ->references('id')->on('protravailext')
                  ->onDelete('cascade');
            $table->integer('ecofamilial_id')->unsigned();
            $table->foreign('ecofamilial_id')
                  ->references('id')->on('ecofamiliales')
                  ->onDelete('cascade');
            $table->integer('mode_id')->unsigned();
            $table->foreign('mode_id')
                  ->references('id')->on('modes')
                  ->onDelete('cascade');
            $table->integer('langue_id')->unsigned();
            $table->foreign('langue_id')
                  ->references('id')->on('langues')
                  ->onDelete('cascade');
            $table->integer('finnance_id')->unsigned();
            $table->foreign('finnance_id')
                  ->references('id')->on('finnances')
                  ->onDelete('cascade');
            $table->integer('techqualifie_id')->unsigned();
            $table->foreign('techqualifie_id')
                  ->references('id')->on('techqualifies')
                  ->onDelete('cascade');
            $table->integer('sportive_id')->unsigned();
            $table->foreign('sportive_id')
                  ->references('id')->on('sportives')
                  ->onDelete('cascade');
            $table->integer('medical_id')->unsigned();
            $table->foreign('medical_id')
                  ->references('id')->on('medicals')
                  ->onDelete('cascade');
            $table->integer('chefentreprise_id')->unsigned();
            $table->foreign('chefentreprise_id')
                  ->references('id')->on('chefentreprises')
                  ->onDelete('cascade');
            $table->integer('gesstion_id')->unsigned();
            $table->foreign('gesstion_id')
                  ->references('id')->on('gesstions')
                  ->onDelete('cascade');
            $table->integer('serviceclient_id')->unsigned();
            $table->foreign('serviceclient_id')
                  ->references('id')->on('serviceclients')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('professionmetiers');
    }
}
