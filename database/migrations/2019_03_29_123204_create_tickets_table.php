<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->bigIncrements('ticketId');
            $table->string("trip");
            $table->bigInteger("price");
            $table->boolean("isBooked")->default(true);
            $table->bigInteger("trainId")->unsigned();
            $table->foreign("trainId")->references("trainId")->on("train");
            $table->bigInteger("passengerId")->unsigned();
            $table->foreign("passengerId")->references("passengerId")->on("passenger")->onDelete("cascade");
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
        Schema::dropIfExists('ticket');
    }
}
