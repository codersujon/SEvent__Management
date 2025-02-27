<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Home
     */
    public function home(){
        return view('front.home');
    }

    /**
     * Contact
     */
    public function contact(){
        return view('front.contact');
    }
}
