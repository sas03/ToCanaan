<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodeCodeProcheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code_code_proche', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code_id')->unsigned();
            $table->foreign('code_id')
                  ->references('id')->on('codes')
                  ->onDelete('cascade');
            $table->integer('code_proche_id')->unsigned();
            $table->foreign('code_proche_id')
                  ->references('id')->on('codes')
                  ->onDelete('cascade');
            $table->enum('type', ['proche', 'envisageable']);
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
        Schema::dropIfExists('code_code_proche');
    }
}
