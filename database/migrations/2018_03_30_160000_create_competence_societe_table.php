<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetenceSocieteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competence_societe', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('competence_id');
            $table->string('competence_type', 255);
            $table->integer('societe_id')->unsigned();
            $table->foreign('societe_id')
                  ->references('id')->on('societes')
                  ->onDelete('cascade');
            $table->enum('statut', ['requise', 'disponible']);
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
        Schema::dropIfExists('competence_societe');
    }
}
