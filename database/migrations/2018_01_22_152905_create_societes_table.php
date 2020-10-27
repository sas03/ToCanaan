<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocietesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('societes', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nom', 255);
          $table->string('telephone', 10)->nullable();
          $table->string('email', 255)->unique();
          $table->string('adresse')->nullable();
          $table->string('ville', 255);
          $table->string('code_postal', 255);
          $table->integer('nbr_employes')->nullable();
          $table->string('secteur_id', 255);
          $table->string('password', 255);
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
        Schema::dropIfExists('societes');
    }
}
