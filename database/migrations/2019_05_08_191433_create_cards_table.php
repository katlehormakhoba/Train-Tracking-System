<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card', function (Blueprint $table) {
            $table->bigIncrements('cardId');
            $table->string("bankName");
            $table->string("cardNumber");
            $table->string("cardOwner");
            $table->string("balance");
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
        Schema::dropIfExists('cards');
    }
}
