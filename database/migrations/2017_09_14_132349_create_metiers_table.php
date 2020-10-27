<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle_metier', 255);
            $table->string('lien_site_onisepfr', 255)->nullable();
            $table->string('nom_publication', 255)->nullable();
            $table->string('collection', 255)->nullable();
            $table->string('annee', 255)->nullable();
            $table->string('code_rome', 255);
            $table->string('codes_rome_proches', 255)->nullable();
            $table->string('libelle_rome', 255)->nullable();
            $table->string('lien_rome', 255)->nullable();
            $table->string('niveau_requis', 255)->nullable();
            $table->text('description')->nullable();
            $table->text('pre_requis')->nullable();
            $table->integer('secteur_id')->nullable();
            $table->text('video')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
