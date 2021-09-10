<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('round')->unsigned();
            $table->foreign('round')->references('id')->on('rounds');

            $table->bigInteger('tournament')->unsigned();
            $table->foreign('tournament')->references('id')->on('tournaments');

            
            $table->string('room_number')->nullable();
            $table->string('room_start_at')->nullable();
            $table->string('room_screen')->nullable();
            $table->string('room_id')->nullable();
            $table->string('room_pass')->nullable();
            $table->integer('max_player')->nullable();
            $table->string('room_status')->nullable();

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
        Schema::dropIfExists('rooms');
    }
}
