<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faires', function (Blueprint $table) {
            $table->increments('id');
            $table->longtext('nom');
            $table->longtext('score');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->integer('mecanique_id')->unsigned();
            $table->foreign('mecanique_id')
                  ->references('id')->on('mecaniques')
                  ->onDelete('cascade');
            $table->integer('sport_id')->unsigned();
            $table->foreign('sport_id')
                  ->references('id')->on('sports')
                  ->onDelete('cascade');
            $table->integer('secuforceordre_id')->unsigned();
            $table->foreign('secuforceordre_id')
                  ->references('id')->on('secuforceordres')
                  ->onDelete('cascade');
            $table->integer('avanture_id')->unsigned();
            $table->foreign('avanture_id')
                  ->references('id')->on('avantures')
                  ->onDelete('cascade');
            $table->integer('extagriculture_id')->unsigned();
            $table->foreign('extagriculture_id')
                  ->references('id')->on('extagricultures')
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
        Schema::dropIfExists('faires');
    }
}
