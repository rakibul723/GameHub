<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participates', function (Blueprint $table) {

            $table->id();

            $table->bigInteger('tournament')->unsigned();
            $table->foreign('tournament')->references('id')->on('tournaments');

            $table->string('organizer_email')->nullable();
            $table->string('gamer_email')->nullable();
            $table->double('participate_fee')->nullable();
            $table->string('organizer_bkash')->nullable();
            $table->string('gamer_bkash')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('fee')->nullable();
            $table->string('round')->nullable();
            $table->boolean('next_round')->default(1);

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
        Schema::dropIfExists('participates');
    }
}
