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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/spec', 'HomeController@spec')->name('spec');

Route::get('/contests/{contest}', 'ContestController@show')->name('contest.show');
Route::post('/contests', 'ContestController@create')->name('contest.create');
