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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get("/demo", function() {
    return view("material-demo");
});

Route::group(['middleware'=>'auth'], function() {

    Route::get('/raport/fixed/{id}', 'RaportController@fixed')->name('fixed.raport');
    Route::resource('raport', 'RaportController', ['names'=>[
        'index' => 'index.raport',
        'create' => 'create.raport',
        'store' => 'store.raport',
    ]
    ]);

});

Route::get('/landingpage', function() {
    return view('landing-page');
});

Route::get('/login', function() {
    return view('login');
});

Route::get('/report', function() {
    return view('report');
});
