<?php

use App\Http\Controllers\StaticPageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * STATIC PAGES CONTROLLERS
 */

//HOMEPAGE

Route::get('/', 'StaticPageController@home')->name('homepage');

//ABOUT US

Route::get('/about', 'StaticPageController@about')->name('about');

//POST RESOURCES PAGES (CRUD) - GESTIONE CRUD SU PAGINE POSTS

Route::resource('posts', 'PostController');
    
