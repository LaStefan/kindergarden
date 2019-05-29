<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Reservation extends Model
{
   //Table name
   protected $table = 'reservations';
   //Primary Key
   public $primaryKey = 'id';
   //Timestamps
   public $timestamps = true;
   //Date
   //protected $dates = ['bookingDate'];

   /*public function setEntryDateAttribute($value)
   {
      $this->attributes['bookingDate'] = Carbon::createFromFormat('Y-m-d', $value);
   }*/

   //RELATIONSHIPS
   public function user(){
      return $this->belongsTo('App\User');
  }

  public function kids()
   {
      return $this->belongsToMany('App\Kid', 'reservation_kids', 
         'reservation_id', 'kid_id')->using('App\ReservationKid');
   }
}
