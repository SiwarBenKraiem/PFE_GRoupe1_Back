<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProlongersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prolongers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idG');
            $table->unsignedBigInteger('idU');
            $table->unsignedBigInteger('idS');
            $table->date('dateFin');
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
        Schema::dropIfExists('prolongers');
    }
}
