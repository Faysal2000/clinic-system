<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function about(){
        return view('frontend.about');
    }

    public function services(){
        return view('frontend.services');
    }

    public function doctors(){
        return view('frontend.doctors');
    }

    public function appointment(){
        return view('frontend.appointment');
    }

    public function contact(){
        return view('frontend.contact');
    }
}
