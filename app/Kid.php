<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kid extends Model
{
     //Table name
   protected $table = 'kids';
   //Primary Key
   public $primaryKey = 'id';
   //Timestamps
   public $timestamps = true;

   //RELATIONSHIPS

   public function reservations()
   {
      return $this->belongsToMany('App\Reservation', 'reservation_kids', 
         'kid_id', 'reservation_id')->using('App\ReservationKid');
         
   }
   public function user(){
      return $this->belongsTo('App\User');
  }
}
