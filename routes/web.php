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
use Faker\Factory;
use Illuminate\Support\Str;

Auth::routes();

Route::get('/', 'RaportController@index');

Route::get('/category/{id}', 'CategoryController@index');

Route::group(['middleware'=>'auth'], function() {

    Route::post('/raport/fixed', 'RaportController@fixed')->name('fixed.raport');

    Route::resource('/report', 'RaportController', ['names'=>[
        'index' => 'index.raport',
        'create' => 'create.raport',
        'store' => 'store.raport',
    ]
    ]);

    Route::get('/user', 'UserController@index');

    Route::get('/volunteer', 'UserController@volunteer')->name('volunteer.index');

});

Route::get('/getgeo', 'UserController@getGeo');
/* Front-end routes */

Route::get('/rank', 'UserController@rank')->name('rank');

Route::get("/dashboard/admin", function() {
    return view("dashboard-admin");
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
