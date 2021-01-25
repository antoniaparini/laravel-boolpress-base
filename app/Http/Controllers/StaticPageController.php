<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    /**
     * HOMEPAGE METHODS
     */

     public function home() {
         return view ('home');
     }

    /**
    * ABOUT METHODS
    */

    public function about() {
        return view ('about');
    }
}
