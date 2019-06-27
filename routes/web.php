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

Route::get('/welcome', function () { return view('welcome'); });
Route::get('/', function () { return view('home'); });
Route::get('/home', function () { return view('home'); });
Route::get('/admin', function () { return view('admin_page'); });
Route::get('/donations', 'donationsController@show'); 
Route::get('/donation_insert', 'donationsController@don_insert');
Route::get('/agents', 'agentsController@show');
Route::get('/register_agent', 'agentsController@agent_insert');
Route::get('/agent_form', function () { return view('agent_new'); });
Route::get('/donation_form', function () { return view('donation_new'); });
Route::get('/manual', function () { return view('manual'); });
Route::get('/districts','districtsController@show');
Route::get('/members', 'membersController@show');
Route::get('/payments', 'paymentsController@show');

