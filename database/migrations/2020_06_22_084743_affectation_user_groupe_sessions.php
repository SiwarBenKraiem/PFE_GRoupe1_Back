<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AffectationUserGroupeSessions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('affectation_user_groupe_sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idG');
            $table->unsignedBigInteger('idU');
            $table->unsignedBigInteger('idS');
            $table->foreign('idU')->references('idU')->on('affectations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idG')->references('idG')->on('affectations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idS')->references('id')->on('sessions')->onDelete('cascade')->onUpdate('cascade');
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
