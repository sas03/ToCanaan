<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppellationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appellations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom', 255);
            $table->string('code_rome', 255);
            $table->integer('code_id')->unsigned();
            $table->foreign('code_id')
                  ->references('id')->on('codes')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('appellations');
    }
}
