<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kid;
use App\User;

class KidsController extends Controller
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

        $kids = Kid::orderBy('name','asc');
        return view('kids.index')->with('kids',$kids);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kids.create');
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
            'name'=> 'required',
            'school'=> 'required',
            'dob'=> 'required',
            'allergies'=> 'required',
            'legalGuardian'=> 'required',
       ]);
       
       //Register a child

       $kid = new Kid;
       $kid->name = $request->input('name');
       $kid->school = $request->input('school');
       $kid->allergies = $request->input('allergies');
       $kid->dob = $request->input('dob');
       $kid->legalGuardian = $request->input('legalGuardian');
       $kid->extraInfo = $request->input('extraInfo');

       $kid->user_id = auth()->user()->id;
       $kid->save();
      
       return redirect('/kids')->with('success','Registration successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kid = Kid::find($id);
        return view('kids.show')->with('kid',$kid);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kid = Kid::find($id);

        
        //Check for correct user
       /*if(auth()->user()->id !== $kid->user_id){
           return redirect('/kids')->with('error','Unauthorized Page'); 
        }*/
        return view('kids.edit')->with('kid',$kid);
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
        $this->validate($request, [
            'name'=> 'required',
            'school'=> 'required',
            'dob'=> 'required',
            'allergies'=> 'required',
            'legalGuardian'=> 'required',
       ]);

       //Update

       $kid = Kid::find($id);
       $kid->name = $request->input('name');
       $kid->school = $request->input('school');
       $kid->allergies = $request->input('allergies');
       $kid->dob = $request->input('dob');
       $kid->legalGuardian = $request->input('legalGuardian');
       $kid->extraInfo = $request->input('extraInfo');
       $kid->save();

       return redirect('/kids')->with('success','Edit Successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kid = Kid::find($id);
       // if(auth()->user()->id !== $post->user_id){
         //   return redirect('posts')->with('error','Unauthorized Page'); 
       // }
        $kid->delete();
        return redirect('/kids')->with('success','Successfully deleted! ');
    }
}
