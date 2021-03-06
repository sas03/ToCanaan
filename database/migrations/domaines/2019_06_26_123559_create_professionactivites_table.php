<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionactivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionactivites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transport_id')->unsigned();
            $table->foreign('transport_id')
                  ->references('id')->on('transports')
                  ->onDelete('cascade');
            $table->integer('alimentation_id')->unsigned();
            $table->foreign('alimentation_id')
                  ->references('id')->on('alimentations')
                  ->onDelete('cascade');
            $table->integer('recherchesciencenat_id')->unsigned();
            $table->foreign('recherchesciencenat_id')
                  ->references('id')->on('recherchesciencenats')
                  ->onDelete('cascade');
            $table->integer('recherchescientifique_id')->unsigned();
            $table->foreign('recherchescientifique_id')
                  ->references('id')->on('recherchescientifiques')
                  ->onDelete('cascade');
            $table->integer('activiterisque_id')->unsigned();
            $table->foreign('activiterisque_id')
                  ->references('id')->on('activiterisques')
                  ->onDelete('cascade');
            $table->integer('artistique_id')->unsigned();
            $table->foreign('artistique_id')
                  ->references('id')->on('artistiques')
                  ->onDelete('cascade');
            $table->integer('securite_id')->unsigned();
            $table->foreign('securite_id')
                  ->references('id')->on('securites')
                  ->onDelete('cascade');
            $table->integer('divertissement_id')->unsigned();
            $table->foreign('divertissement_id')
                  ->references('id')->on('divertissements')
                  ->onDelete('cascade');
            $table->integer('communicationfoule_id')->unsigned();
            $table->foreign('communicationfoule_id')
                  ->references('id')->on('communicationfoules')
                  ->onDelete('cascade');
            $table->integer('amenagementpaysager_id')->unsigned();
            $table->foreign('amenagementpaysager_id')
                  ->references('id')->on('amenagementpaysagers')
                  ->onDelete('cascade');
            $table->integer('communicationecrite_id')->unsigned();
            $table->foreign('communicationecrite_id')
                  ->references('id')->on('communicationecrites')
                  ->onDelete('cascade');
            $table->integer('relligieux_id')->unsigned();
            $table->foreign('relligieux_id')
                  ->references('id')->on('relligieuxes')
                  ->onDelete('cascade');
            $table->integer('agriculture_id')->unsigned();
            $table->foreign('agriculture_id')
                  ->references('id')->on('agricultures')
                  ->onDelete('cascade');
            $table->integer('hotellerie_id')->unsigned();
            $table->foreign('hotellerie_id')
                  ->references('id')->on('hotelleries')
                  ->onDelete('cascade');
            $table->integer('recherchemedicale_id')->unsigned();
            $table->foreign('recherchemedicale_id')
                  ->references('id')->on('recherchemedicales')
                  ->onDelete('cascade');
            $table->integer('enseignemente_id')->unsigned();
            $table->foreign('enseignemente_id')
                  ->references('id')->on('enseignementes')
                  ->onDelete('cascade');
            $table->integer('internationall_id')->unsigned();
            $table->foreign('internationall_id')
                  ->references('id')->on('internationalls')
                  ->onDelete('cascade');
            $table->integer('servicesante_id')->unsigned();
            $table->foreign('servicesante_id')
                  ->references('id')->on('servicesantes')
                  ->onDelete('cascade');
            $table->integer('apportsoinmedicaux_id')->unsigned();
            $table->foreign('apportsoinmedicaux_id')
                  ->references('id')->on('apportsoinmedicauxes')
                  ->onDelete('cascade');
            $table->integer('musical_id')->unsigned();
            $table->foreign('musical_id')
                  ->references('id')->on('musicales')
                  ->onDelete('cascade');
            $table->integer('travauxmensuel_id')->unsigned();
            $table->foreign('travauxmensuel_id')
                  ->references('id')->on('travauxmensuels')
                  ->onDelete('cascade');
            $table->integer('conseill_id')->unsigned();
            $table->foreign('conseill_id')
                  ->references('id')->on('conseills')
                  ->onDelete('cascade');
            $table->integer('sportif_id')->unsigned();
            $table->foreign('sportif_id')
                  ->references('id')->on('sportifs')
                  ->onDelete('cascade');
            $table->integer('geniecivil_id')->unsigned();
            $table->foreign('geniecivil_id')
                  ->references('id')->on('geniecivils')
                  ->onDelete('cascade');
            $table->integer('animaux_id')->unsigned();
            $table->foreign('animaux_id')
                  ->references('id')->on('animauxes')
                  ->onDelete('cascade');
            $table->integer('usine_id')->unsigned();
            $table->foreign('usine_id')
                  ->references('id')->on('usines')
                  ->onDelete('cascade');
            $table->integer('compolitique_id')->unsigned();
            $table->foreign('compolitique_id')
                  ->references('id')->on('compolitiques')
                  ->onDelete('cascade');
            $table->integer('serviceclientele_id')->unsigned();
            $table->foreign('serviceclientele_id')
                  ->references('id')->on('serviceclienteles')
                  ->onDelete('cascade');
            $table->integer('gestione_id')->unsigned();
            $table->foreign('gestione_id')
                  ->references('id')->on('gestiones')
                  ->onDelete('cascade');
            $table->integer('coiffure_id')->unsigned();
            $table->foreign('coiffure_id')
                  ->references('id')->on('coiffures')
                  ->onDelete('cascade');
            $table->integer('administratif_id')->unsigned();
            $table->foreign('administratif_id')
                  ->references('id')->on('administratifs')
                  ->onDelete('cascade');
            $table->integer('autoentrepreneur_id')->unsigned();
            $table->foreign('autoentrepreneur_id')
                  ->references('id')->on('autoentrepreneurs')
                  ->onDelete('cascade');
            $table->integer('communicationvente_id')->unsigned();
            $table->foreign('communicationvente_id')
                  ->references('id')->on('communicationventes')
                  ->onDelete('cascade');
            $table->integer('math_id')->unsigned();
            $table->foreign('math_id')
                  ->references('id')->on('maths')
                  ->onDelete('cascade');
            $table->integer('electronique_id')->unsigned();
            $table->foreign('electronique_id')
                  ->references('id')->on('electroniques')
                  ->onDelete('cascade');
            $table->integer('finance_id')->unsigned();
            $table->foreign('finance_id')
                  ->references('id')->on('finances')
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
        Schema::dropIfExists('professionactivites');
    }
}
