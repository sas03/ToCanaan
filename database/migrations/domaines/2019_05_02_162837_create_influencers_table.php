<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfluencersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('influencers', function (Blueprint $table) {
          $table->increments('id');
          $table->longtext('nom');
          $table->longtext('score');
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
          $table->integer('religieux_id')->unsigned();
          $table->foreign('religieux_id')
                ->references('id')->on('religieuxes')
                ->onDelete('cascade');
          $table->integer('conseil_id')->unsigned();
          $table->foreign('conseil_id')
                ->references('id')->on('conseils')
                ->onDelete('cascade');
          $table->integer('enseignement_id')->unsigned();
          $table->foreign('enseignement_id')
                ->references('id')->on('enseignements')
                ->onDelete('cascade');
          $table->integer('legislation_id')->unsigned();
          $table->foreign('legislation_id')
                ->references('id')->on('legislations')
                ->onDelete('cascade');
          $table->integer('gestion_id')->unsigned();
          $table->foreign('gestion_id')
                ->references('id')->on('gestions')
                ->onDelete('cascade');
          $table->integer('international_id')->unsigned();
          $table->foreign('international_id')
                ->references('id')->on('internationals')
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
        Schema::dropIfExists('influencers');
    }
}
