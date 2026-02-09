<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.index');
    }
    public function about(){
        return view('frontend.about');
    }
    public function services(){
        return view('frontend.services');
    }
    public function doctors(){
        return view('frontend.doctors');
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function appointment(){
        return view('frontend.appointment');
    }
    // public function index(){
    //     return view('frontend.index');
    // }
}
