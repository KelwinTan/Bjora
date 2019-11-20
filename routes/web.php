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

Route::get('/', function () {
    return view('credits.instructions');
});

Route::get('/credits', function () {
    return view('credits.welcome');
});

Auth::routes();

Route::get('/home', 'QuestionController@index')->name('home');

Route::group(['prefix' => 'question'], function () {
    Route::get('/add', 'QuestionController@createForm')->name('member-add-question-form');
    Route::post('/add', 'QuestionController@create')->name('member-add-question');
});

//Routing for User Profile
Route::group(['prefix' => 'profile'], function () {
    Route::get('/user', 'UserController@showProfile')->name('show-profile');
    Route::get('/update', 'UserController@showUpdateProfile')->name('show-update-profile');
    Route::post('/update', 'UserController@updateProfile')->name('Update Profile');
});


Route::group(['prefix' => 'admin', 'middleware' => 'CheckAdmin'], function () {

    Route::get('/home', function () {
        return view('admin');
    });

    Route::get('/manage-user', 'AdminController@manageUser');
    Route::get('/add-user', 'AdminController@addUserForm')->name('admin-add-user');
    Route::post('/add-user', 'AdminController@createUser');


    Route::group(['prefix' => 'topic'], function () {
        Route::get('/', 'TopicController@index');
    });


});


