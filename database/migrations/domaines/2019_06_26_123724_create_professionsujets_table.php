<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionsujetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionsujets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('art_id')->unsigned();
            $table->foreign('art_id')
                  ->references('id')->on('arts')
                  ->onDelete('cascade');
            $table->integer('languetrangere_id')->unsigned();
            $table->foreign('languetrangere_id')
                  ->references('id')->on('languetrangeres')
                  ->onDelete('cascade');
            $table->integer('religion_id')->unsigned();
            $table->foreign('religion_id')
                  ->references('id')->on('religions')
                  ->onDelete('cascade');
            $table->integer('perfpublique_id')->unsigned();
            $table->foreign('perfpublique_id')
                  ->references('id')->on('perfpubliques')
                  ->onDelete('cascade');
            $table->integer('science_id')->unsigned();
            $table->foreign('science_id')
                  ->references('id')->on('sciences')
                  ->onDelete('cascade');
            $table->integer('ensseignement_id')->unsigned();
            $table->foreign('ensseignement_id')
                  ->references('id')->on('ensseignements')
                  ->onDelete('cascade');
            $table->integer('etudsocial_id')->unsigned();
            $table->foreign('etudsocial_id')
                  ->references('id')->on('etudsociales')
                  ->onDelete('cascade');
            $table->integer('francais_id')->unsigned();
            $table->foreign('francais_id')
                  ->references('id')->on('francais')
                  ->onDelete('cascade');
            $table->integer('etudtechno_id')->unsigned();
            $table->foreign('etudtechno_id')
                  ->references('id')->on('etudetechnologiques')
                  ->onDelete('cascade');
            $table->integer('musique_id')->unsigned();
            $table->foreign('musique_id')
                  ->references('id')->on('musiques')
                  ->onDelete('cascade');
            $table->integer('ecodomestique_id')->unsigned();
            $table->foreign('ecodomestique_id')
                  ->references('id')->on('ecodomestiques')
                  ->onDelete('cascade');
            $table->integer('aggriculture_id')->unsigned();
            $table->foreign('aggriculture_id')
                  ->references('id')->on('aggricultures')
                  ->onDelete('cascade');
            $table->integer('affaire_id')->unsigned();
            $table->foreign('affaire_id')
                  ->references('id')->on('affaires')
                  ->onDelete('cascade');
            $table->integer('atelier_id')->unsigned();
            $table->foreign('atelier_id')
                  ->references('id')->on('ateliers')
                  ->onDelete('cascade');
            $table->integer('adminnistratif_id')->unsigned();
            $table->foreign('adminnistratif_id')
                  ->references('id')->on('adminnistratifs')
                  ->onDelete('cascade');
            $table->integer('finence_id')->unsigned();
            $table->foreign('finence_id')
                  ->references('id')->on('finences')
                  ->onDelete('cascade');
            $table->integer('mathematique_id')->unsigned();
            $table->foreign('mathematique_id')
                  ->references('id')->on('mathematiques')
                  ->onDelete('cascade');
            $table->integer('educphyssport_id')->unsigned();
            $table->foreign('educphyssport_id')
                  ->references('id')->on('educphyssports')
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
        Schema::dropIfExists('professionsujets');
    }
}
