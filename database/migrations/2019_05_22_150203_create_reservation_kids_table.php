<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Reservation;
use App\Kid;

class CreateReservationKidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_kids', function (Blueprint $table) {
            $table->increments('id');
            $table->string('present');
            $table->string('emergencyCare');
            $table->string('checkOut');
            $table->timestamps();

           // $table->foreign('res_kid_id')->references('res_id')->on('reservations');
           // $table->foreign('res_kid_id')->references('kid_id')->on('kids');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation_kids');
    }
}
