<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalysersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analysers', function (Blueprint $table) {
            $table->increments('id');
            $table->longtext('nom');
            $table->longtext('score');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->integer('infofinance_id')->unsigned();
            $table->foreign('infofinance_id')
                  ->references('id')->on('infofinances')
                  ->onDelete('cascade');
            $table->integer('sciencetechno_id')->unsigned();
            $table->foreign('sciencetechno_id')
                  ->references('id')->on('sciencetechnos')
                  ->onDelete('cascade');
            $table->integer('sciencesante_id')->unsigned();
            $table->foreign('sciencesante_id')
                  ->references('id')->on('sciencesantes')
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
        Schema::dropIfExists('analysers');
    }
}
