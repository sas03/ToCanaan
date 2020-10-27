<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aiders', function (Blueprint $table) {
            $table->increments('id');
            $table->longtext('nom');
            $table->longtext('score');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->integer('serviice_id')->unsigned();
            $table->foreign('serviice_id')
                  ->references('id')->on('serviices')
                  ->onDelete('cascade');
            $table->integer('scienceconso_id')->unsigned();
            $table->foreign('scienceconso_id')
                  ->references('id')->on('scienceconsos')
                  ->onDelete('cascade');
            $table->integer('soinanimalier_id')->unsigned();
            $table->foreign('soinanimalier_id')
                  ->references('id')->on('soinanimaliers')
                  ->onDelete('cascade');
                  $table->integer('transsport_id')->unsigned();
                  $table->foreign('transsport_id')
                        ->references('id')->on('transsports')
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
        Schema::dropIfExists('aiders');
    }
}
