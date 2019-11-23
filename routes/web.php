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

    Route::get('/update/{id}', 'QuestionController@updateForm')->name('update-question-form');
    Route::post('/update/{question}', 'QuestionController@update')->name('update-question');

    Route::get('/my', 'QuestionController@show')->name('user-question');

    Route::put('/closed/{question}', 'QuestionController@close')->name('close-question');

    Route::delete('/{id}', 'QuestionController@destroy')->name('delete-question');
});

//Routing for User Profile
Route::group(['prefix' => 'profile'], function () {
    Route::get('/user', 'UserController@showProfile')->name('show-profile');
    Route::get('/update', 'UserController@showUpdateProfile')->name('show-update-profile');
    Route::post('/update', 'UserController@updateProfile')->name('Update Profile');

    Route::get('/send-message', 'UserController@sendMsgForm')->name('user-send-msg-form');

});

//Routing for Admin
Route::group(['prefix' => 'admin', 'middleware' => 'CheckAdmin'], function () {

    Route::get('/home', function () {
        return view('admin.admin');
    })->name('admin-dashboard');

//    Routes for managing users, questions and topics
    Route::get('/manage-user', 'AdminController@manageUser')->name('admin-manage-user');
    Route::get('/manage-question', 'AdminController@manageQuestion')->name('admin-manage-question');
    Route::get('/manage-topic', 'AdminController@manageTopic')->name('admin-manage-topic');

//  Admin Route for adding user
    Route::get('/add-user', 'AdminController@addUserForm')->name('admin-add-user-form');
    Route::post('/add-user', 'AdminController@createUser')->name('admin-add-user');

//   Admin Route for adding question
    Route::get('/add-question', 'AdminController@addQuestionForm')->name('admin-add-question-form');

//    Admin Route for deleting question
    Route::delete('/question/{question}', 'AdminController@deleteQuestion')->name('admin-delete-question');

    Route::get('/add-topic', 'TopicController@createForm')->name('admin-add-topic-form');
    Route::post('/add-topic', 'TopicController@create')->name('admin-add-topic');

    Route::get('/update-topic/{id}', 'TopicController@updateForm')->name('admin-update-topic-form');
    Route::post('/update-topic/{topic}', 'TopicController@update')->name('admin-update-topic');
    Route::delete('/topic/{topic}', 'TopicController@destroy')->name('admin-delete-topic');

//    Admin Route for deleting user
    Route::delete('/user/{user}', 'AdminController@deleteUser')->name('admin-delete-user');

//    Admin Update User
    Route::get('/update-user/{user}', 'AdminController@updateUserForm')->name('admin-update-user-form');
    Route::post('/update-user/{user}', 'AdminController@updateUser')->name('admin-update-user');

//    Admin Update Question
    Route::get('/update-question/{question}', 'AdminController@updateQuestionForm')->name('admin-update-question-form');
    Route::put('/update-question/{question}', 'AdminController@updateQuestion')->name('admin-update-question');

    Route::put('/closed/{question}', 'AdminController@closeQuestion')->name('admin-close-question');

    Route::group(['prefix' => 'topic'], function () {
        Route::get('/', 'TopicController@index');
    });


});


