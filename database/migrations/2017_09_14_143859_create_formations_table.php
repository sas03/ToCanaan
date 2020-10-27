<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('code_rome1', 255)->nullable();
            $table->string('code_rome2', 255)->nullable();
            $table->string('code_rome3', 255)->nullable();
            $table->string('codes_rome', 255)->nullable();
            $table->string('niveau_entree', 255)->nullable();
            $table->string('niveau_sortie', 255)->nullable();
            $table->string('duree', 255)->nullable();
            $table->string('alternance', 255)->nullable();
            $table->string('certifiante', 255)->nullable();
            $table->text('etablissements_id')->nullable();
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
        Schema::dropIfExists('formations');
    }
}
