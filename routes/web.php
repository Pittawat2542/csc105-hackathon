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

Route::group(['middleware' => 'auth'], function () {

    Route::get("/raport/fixed/thank", "RaportController@thanks");

    Route::post('/raport/fixed/{id}', 'RaportController@fixed')->name('fixed.raport');

    Route::resource('/report', 'RaportController', ['names' => [
        'index' => 'index.raport',
        'create' => 'create.raport',
        'store' => 'store.raport',
    ]
    ]);

    Route::get('/user', 'UserController@index');

    Route::get('/volunteer', 'UserController@volunteer')->name('volunteer.index');

    Route::get('/wishlist/{id}/store', 'WishlistController@store')->name('store.wishlist');
    Route::resource('/wishlist', 'WishlistController', ['except' => ['create', 'edit', 'show', 'update']]);

});

Route::group(['middleware' => 'admin'], function () {

    //index page of admin page
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::delete('/admin/raport/{id}', 'AdminController@destroy')->name('admin.delete.raport');
    Route::get('/admin/raport/{id}/edit', 'AdminController@edit')->name('admin.edit.raport');
    Route::post('/admin/raport/{id}/update', 'AdminController@update')->name('admin.update.raport');

});

Route::get('/getgeo', 'UserController@getGeo');

Route::get('/rank', 'UserController@rank')->name('rank');

Route::get("/static/prize", function () {
    return view("static.prize");
});

Route::get('/fakereg', function () {
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

Route::get("/fixed-thank", function () {
    return view('fixed-report-thank');
});

Route::get("/static/report-fixed", function () {
    return view("static-fixed-report");
});
