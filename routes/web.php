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

Route::auth();
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('upload_image','EventImageController@index')->name('upload_image');
Route::post('upload_image/files','EventImageController@getFiles');

Route::get('event_standings','EventStandingsController@index')->name('event_standings');

Route::get('update_vote_count','EventStandingsController@voteForImage');
