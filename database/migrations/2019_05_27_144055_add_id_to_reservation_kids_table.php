<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdToReservationKidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservation_kids', function (Blueprint $table) {
            $table->integer('kid_id')->unsigned()->nullable();
            $table->integer('reservation_id')->unsigned()->nullable();
            
        
        });
       // Schema::table('reservation_kids', function (Blueprint $table){
         //   $table->foreign('kid_id')->references('id')->on('kids')->onDelete('cascade');
        //    $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
      //  });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservation_kids', function (Blueprint $table) {
            $table->dropColumn('kid_id');
            $table->dropColumn('reservation_id');
            $table->dropForeign(['kid_id']);
            $table->dropForeign(['reservation_id']);
        });
    }
}
