<?php

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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function(){
    //Enter to CPanel
    Route::get('/home', 'HomeController@index')->name('home');
    //Manage Categories
    Route::resource('/home/categories','CategoryController')->except(['show']);    
    //Manage Posts
    Route::resource('/home/posts','PostController');    
});





