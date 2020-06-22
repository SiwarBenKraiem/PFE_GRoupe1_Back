<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FormationModule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('formation_modules' , function (Blueprint $table) {
            $table->unsignedBigInteger('id_module');
            $table->unsignedBigInteger('id_formation') ;
            $table->unsignedBigInteger('duree') ->nullable(true);

            $table->foreign('id_module')->references('id')->on('modules')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_formation')->references('id')->on('formations')->onDelete('cascade')->onUpdate('cascade');
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
        //
    }
}
