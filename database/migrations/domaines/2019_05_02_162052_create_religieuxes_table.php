<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReligieuxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('religieuxes', function (Blueprint $table) {
            $table->increments('id');
            $table->longtext('nom');
            $table->longtext('score');
            $table->integer('relligieux_id')->unsigned();
            $table->foreign('relligieux_id')
                  ->references('id')->on('relligieuxes')
                  ->onDelete('cascade');
            $table->integer('religion_id')->unsigned();
            $table->foreign('religion_id')
                  ->references('id')->on('religions')
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
        Schema::dropIfExists('religieuxes');
    }
}
