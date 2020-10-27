<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom', 255);
            $table->string('prenom', 255);
            $table->string('email', 255)->unique();
            $table->string('ville', 255);
            $table->string('code_postal', 255);
            $table->string('password', 255);
            $table->date('date_de_naissance')->nullable();
            $table->string('telephone', 10)->nullable();
            $table->string('niveau_admission', 255)->nullable();
            $table->string('diplome_souhaite', 255)->nullable();
            $table->string('type_detablissement', 255)->nullable();
            $table->string('secteurs', 255)->nullable();
            $table->string('metier', 255)->nullable();
            $table->enum('role', ['user', 'admin'])->default('user');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE users CHANGE code_postal code_postal INT(5) UNSIGNED ZEROFILL NOT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
