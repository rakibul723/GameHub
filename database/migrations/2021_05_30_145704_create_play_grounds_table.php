<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayGroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('play_grounds', function (Blueprint $table) {
            $table->id();


            $table->bigInteger('round')->unsigned();
            $table->foreign('round')->references('id')->on('rounds');

            $table->bigInteger('tournament')->unsigned();
            $table->foreign('tournament')->references('id')->on('tournaments');

            $table->bigInteger('room')->unsigned();
            $table->foreign('room')->references('id')->on('rooms');

            $table->string('gamer_email')->nullable();
            $table->string('gamer_screen')->nullable();
            $table->string('score_ss')->nullable();

            
            
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
        Schema::dropIfExists('play_grounds');
    }
}
