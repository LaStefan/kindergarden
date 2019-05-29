<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\User;

class ReservationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       // $user_id = auth()->user()->id;
       // $user = User::find($user_id);

        $reservations = Reservation::orderBy('created_at','desc')->paginate(5);
        return view('reservations.index')->with('reservations',$reservations);
       //return view('reservations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'bookingDate'=> 'required',
       ]);
       
       //Place a reservation

       $reservation = new Reservation;
       $reservation->bookingDate = $request->input('bookingDate');
       
        $reservation->user_id = auth()->user()->id;
       $reservation->save();
      
       return redirect('/reservations')->with('success','Reservation Placed!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::find($id);
        return view('reservations.show')->with('reservation',$reservation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = Reservation::find($id);
        //Check for correct user
       /*if(auth()->user()->id !== $reservation->user_id){
        return redirect('/reservations')->with('error','Unauthorized Page'); }*/
                                        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        // if(auth()->user()->id !== $post->user_id){
          //   return redirect('posts')->with('error','Unauthorized Page'); 
        // }
         $reservation->delete();
         return redirect('/reservations')->with('success','Successfully deleted! ');
    }
}
