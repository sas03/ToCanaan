<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodeSavoirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code_savoir', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code_id')->unsigned();
            $table->foreign('code_id')
                  ->references('id')->on('codes')
                  ->onDelete('cascade');
            $table->integer('savoir_id')->unsigned();
            $table->foreign('savoir_id')
                  ->references('id')->on('savoirs')
                  ->onDelete('cascade');
            $table->enum('type', ['base', 'spe']);
            $table->rememberToken();
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
        Schema::dropIfExists('code_savoir');
    }
}
