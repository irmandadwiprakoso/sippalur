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
    Route::delete('/user/{user}', 'AuthController@deleteuser');
});

Route::group(['middleware' => ['auth','checkrole:superadmin,admin,sekret']],function(){
    Route::resource('asn', 'AsnController');
    Route::resource('pns', 'PnsController');
    Route::get('/exportasn', 'AsnController@exportasn');
    Route::resource('tkk', 'TkkController');
    Route::get('/exporttkk', 'TkkController@exporttkk');
    // Route::resource('tkk/{tkk}/profile', 'TkkController@view');
});

Route::group(['middleware' => ['auth','checkrole:user']],function(){
    // Route::resource('tkk/{tkk}/profile', 'TkkController@view');
    Route::get('/profile', 'TkkController@profile');
});

Route::group(['middleware' => ['auth','checkrole:superadmin,admin,user,sekret,kessos,permasbang,pemtibum']],function(){
    Route::get('/dashboard', 'AdminController@dashboard');
    Route::get('/password/reset', 'PasswordController@reset');
    Route::patch('/password/update', 'PasswordController@update');
    Route::resource('pamor', 'PamorController');
    Route::get('/exportpamor', 'PamorController@exportpamor');
    Route::post('/importwarga', 'WargaController@importwarga');
});

Route::group(['middleware' => ['auth','checkrole:superadmin,admin,user,kessos,pemtibum,permasbang,sekret']],function(){
    Route::get('/exportibadah', 'RumahIbadahController@ibadahexport');
    Route::resource('ibadah', 'RumahIbadahController');
    Route::resource('pendidikan','SaranaPendidikanController');
    Route::get('/exportpendidikan', 'SaranaPendidikanController@pendidikanexport');
    Route::resource('kesehatan','SaranaKesehatanController');
    Route::get('/exportkesehatan','SaranaKesehatanController@kesehatanexport');
    Route::resource('covid19','Covid19Controller');
    Route::get('/exportcovid19', 'Covid19Controller@covid19export');
});

Route::group(['middleware' => ['auth','checkrole:superadmin,admin,user,pemtibum']],function(){
    Route::resource('warga','WargaController');
    Route::resource('ktp','KtpController');
    Route::patch('/ktp/{ktp}', 'KtpController@update');
    Route::resource('kependudukan','KependudukanController');
    Route::get('/exportkependudukan', 'KependudukanController@exportkependudukan');
    Route::resource('rtrw','RtrwController');
    Route::resource('ksbrt','ksbrtController');
    Route::resource('ksbrw','ksbrwController');
    Route::get('/exportksbrt', 'ksbrtController@ksbrtexport');
    Route::get('/exportksbrw', 'ksbrwController@ksbrwexport');
});

Route::group(['middleware' => ['auth','checkrole:superadmin,admin,user,permasbang']],function(){
    Route::resource('fasosfasum','FasosfasumController');
    Route::get('/exportfasosfasum', 'FasosfasumController@fasosfasumexport');
});



// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
