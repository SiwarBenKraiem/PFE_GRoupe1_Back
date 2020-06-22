<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_contenu');
            $table->string('contenu');
            $table->unsignedBigInteger('id_module');
             $table->foreign('id_module')->references('id')->on('modules')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_type');
             $table->foreign('id_type')->references('id')->on('types')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contenus');
    }
}
