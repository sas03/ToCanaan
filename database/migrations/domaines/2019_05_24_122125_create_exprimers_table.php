<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExprimersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exprimers', function (Blueprint $table) {
            $table->increments('id');
            $table->longtext('nom');
            $table->longtext('score');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->integer('ecrit_id')->unsigned();
            $table->foreign('ecrit_id')
                  ->references('id')->on('ecrits')
                  ->onDelete('cascade');
            $table->integer('prestation_id')->unsigned();
            $table->foreign('prestation_id')
                  ->references('id')->on('prestations')
                  ->onDelete('cascade');
            $table->integer('artistique_id')->unsigned();
            $table->foreign('artistique_id')
                  ->references('id')->on('artistiques')
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
        Schema::dropIfExists('exprimers');
    }
}
