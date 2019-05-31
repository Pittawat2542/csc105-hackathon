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

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::group(['middleware'=>'auth'], function() {

    Route::get('/raport/fixed/{id}', 'RaportController@fixed')->name('fixed.raport');
    Route::resource('raport', 'RaportController', ['names'=>[
        'index' => 'index.raport',
        'create' => 'create.raport',
        'store' => 'store.raport',
    ]
    ]);

});


Route::get('/getgeo', 'UserController@getGeo');

/* Front-end routes */

Route::get('/landingpage', function() {
    return view('landing-page');
});

Route::get('/report', function() {
    return view('report');
});

Route::get('/rank', function() {
    return view('volunteer-ranking');
});

Route::get("/demo", function() {
    return view("material-demo");
});

Route::get('/fakereg',function() {
    $faker = Faker\Factory::create();
    $faker->locale('th_TH');
    User::create([
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'remember_token' => Str::random(10),
    ]);
    return redirect('/');
});