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

Route::get('/', 'AuthController@index');
Route::get('register', 'AuthController@create');
Route::get('forget', 'AuthController@forget');
Route::post('forget', 'AuthController@forget_password');
Route::post('register/store', 'AuthController@store');
Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');

Route::middleware('system.auth')->group(function(){
    Route::get('profile','QuestionController@profile');
    Route::get('ujian','QuestionController@index');
    Route::get('skor','QuestionController@skor');
    Route::post('finish','QuestionController@finish');
    Route::post('ajax','QuestionController@ajax');
    Route::post('answer','QuestionController@answer');
    Route::post('store','QuestionController@store');
});

//superadmin
Route::namespace('admin')->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('dashboard','DashboardController@index');

        Route::get('question','MasterQuestionController@index');
        Route::get('question/datatables','MasterQuestionController@datatables');
        Route::get('question/ajax/{id}','MasterQuestionController@ajax');
        Route::get('question/create','MasterQuestionController@create');
        Route::post('question/store','MasterQuestionController@store');
        Route::delete('question/{id}','MasterQuestionController@destroy');

        Route::get('user','UserController@index');
        Route::get('user/datatables','UserController@datatables');

        Route::get('live','LiveScoreController@index');
    });
});
