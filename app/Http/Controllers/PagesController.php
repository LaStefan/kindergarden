<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title= 'More than childcare!';
        return view('pages.index')->with('title',$title);
    }
    public function about(){
        $title= 'About Us';
        return view('pages.about')->with('title',$title);
    }

    public function profile(){
        $title= 'Profile Page';
        return view('pages.profile')->with('title',$title);
        
    }
  
}
