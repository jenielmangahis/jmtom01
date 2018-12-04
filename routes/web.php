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
    return view('welcome');
});

/*
 * Controller to test model crud function (add,edit & delete) function
*/
Route::get('benchmark/testMailOutModel', ['as'=>'benchmark/testMailOutModel','uses'=>'BenchmarkController@testMailOutModel']);