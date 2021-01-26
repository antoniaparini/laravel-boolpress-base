<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    //HOMEPAGE ROUTE
    public function home() {
        return view('home');
    }

    //ABOUT ROUTE
    public function about() {
        return view('about');
    }
    
}
