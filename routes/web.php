<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth','checkrole:superadmin']],function(){
    Route::get('/register', 'AuthController@register');
    Route::post('/saveregister', 'AuthController@saveregister');
    Route::get('/user', 'AuthController@user');
    Route::get('/user/{user}/changepassword', 'AuthController@changepassword');
    Route::patch('/user/{user}', 'AuthController@updatepassword');

});

Route::group(['middleware' => ['auth','checkrole:superadmin,admin,sekret']],function(){
    Route::resource('asn', 'AsnController');
    Route::resource('tkk', 'TkkController');
    Route::resource('tkk/{tkk}/profile', 'TkkController@view');
});


Route::group(['middleware' => ['auth','checkrole:superadmin,admin,user,sekret,kessos,permasbang,pemtibum']],function(){
    Route::get('/dashboard', 'AdminController@dashboard');
    // Route::get('/profile', 'TkkController@profile');
    Route::get('/password/reset', 'PasswordController@reset');
    Route::patch('/password/update', 'PasswordController@update');
});

Route::group(['middleware' => ['auth','checkrole:superadmin,admin,user,kessos']],function(){
    Route::get('/exportibadah', 'RumahIbadahController@ibadahexport');
    Route::resource('ibadah', 'RumahIbadahController');
    Route::resource('pendidikan','SaranaPendidikanController');
    Route::resource('kesehatan','SaranaKesehatanController');
});



// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
