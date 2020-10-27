<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEcritsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecrits', function (Blueprint $table) {
            $table->increments('id');
            $table->longtext('nom');
            $table->longtext('score');
            $table->integer('professionactivite_id')->unsigned();
            $table->foreign('professionactivite_id')
                  ->references('id')->on('professionactivites')
                  ->onDelete('cascade');
            $table->integer('professionsujet_id')->unsigned();
            $table->foreign('professionsujet_id')
                  ->references('id')->on('professionsujets')
                  ->onDelete('cascade');
            $table->integer('professionmetier_id')->unsigned();
            $table->foreign('professionmetier_id')
                  ->references('id')->on('professionmetiers')
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
        Schema::dropIfExists('ecrits');
    }
}
