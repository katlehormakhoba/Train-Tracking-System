<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('train', function (Blueprint $table) {
            $table->bigIncrements('trainId');
            $table->bigInteger("trainNumber");
            $table->string("isAvailable");
            $table->string("location");
            $table->Integer("currentLoad")->default(0);
            $table->Integer("maximumLoad");
            $table->string("departureTime")->nullable();
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
        Schema::dropIfExists('train');
    }
}
