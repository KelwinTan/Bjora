<?php

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

Route::get('/', function (){
   return view('');
});

Route::get('/credits', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'admin', 'prefix' => 'user'], function (){

    Route::get('/adminhome', function (){
        return view('admin');
    });

    Route::group(['prefix' => 'topic'], function (){
        Route::get('/', 'TopicController@index');


    });


});
