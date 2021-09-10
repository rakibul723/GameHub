<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {

            $table->id();

            $table->string('poster')->nullable();
            $table->string('tournament_name')->nullable();
            $table->string('game_name')->nullable();
            $table->string('organizer')->nullable();
            $table->string('start_date')->nullable();
            $table->double('participate_fee')->nullable();
            $table->longText('prize_description')->nullable();
            $table->string('t_status')->nullable();

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
        Schema::dropIfExists('tournaments');
    }
}
