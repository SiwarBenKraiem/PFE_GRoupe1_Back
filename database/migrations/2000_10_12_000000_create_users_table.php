<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nom');
            $table->string('prenom');
            $table->integer('Role');
            $table->date('dateSuppression');
            $table->boolean('suppression')->nullable(true);
        $table->unsignedBigInteger('id_domaine')->nullable(true);
          $table->foreign('id_domaine')->references('id_domaine')->on('specialites')->onDelete('cascade')->onUpdate('cascade');
           $table->unsignedBigInteger('id_specialite')->nullable(true);
           $table->foreign('id_specialite')->references('id')->on('specialites')->onDelete('cascade')->onUpdate('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
