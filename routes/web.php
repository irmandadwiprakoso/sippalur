<?php

use App\Covid19;
use App\Http\Controllers\Covid19Controller;
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

    Route::delete('/user/{user}', 'AuthController@deleteuser');

    Route::get('/user/{user}/changepassword', 'AuthController@changepassword');
    Route::patch('/user/{user}', 'AuthController@updatepassword');

    Route::get('/user/{user}/edit', 'AuthController@edituser');
    Route::patch('/user/{user}/updateuser', 'AuthController@updateuser');

    Route::get('/user/{user}/editusername', 'AuthController@editusername');
    Route::patch('/user/{user}/updateusername', 'AuthController@updateusername');

    Route::get('getdatauser', [
        'uses' => 'AuthController@getdatauser',
        'as' => 'ajax.get.data.user',
        ]);
    Route::post('user.hapususer', 'AuthController@hapususer')->name('hapususer');
});

Route::group(['middleware' => ['auth','checkrole:superadmin,admin,sekret']],function(){
    // Route::resource('pns', 'PnsController');

    Route::resource('asn', 'AsnController');
    Route::get('/exportasn', 'AsnController@exportasn');
    Route::get('getdataasn', [
        'uses' => 'AsnController@getdataasn',
        'as' => 'ajax.get.data.asn',
        ]);
    Route::post('asn.hapusasn', 'AsnController@hapusasn')->name('hapusasn');

    Route::resource('tkk', 'TkkController');
    Route::get('/exporttkk', 'TkkController@exporttkk');
    Route::get('getdatatkk', [
        'uses' => 'TkkController@getdatatkk',
        'as' => 'ajax.get.data.tkk',
        ]);
    Route::post('tkk.hapustkk', 'TkkController@hapustkk')->name('hapustkk');
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

    // Route::post('/importwarga', 'WargaController@importwarga');

    Route::resource('pamor', 'PamorController'); //LAPORAN HARIAN PAMOR

    Route::get('/exportpamor', 'PamorController@exportpamor');
    Route::get('getdatapamor', [
        'uses' => 'PamorController@getdatapamor',
        'as' => 'ajax.get.data.pamor',
        ]);
    Route::post('pamor.hapuspamor', 'PamorController@hapus')->name('hapuspamor');
});

Route::group(['middleware' => ['auth','checkrole:superadmin,admin,user,kessos,pemtibum,permasbang,sekret']],function(){
    Route::get('/exportibadah', 'RumahIbadahController@ibadahexport');
    Route::resource('ibadah', 'RumahIbadahController');
    Route::get('getdataibadah', [
        'uses' => 'RumahIbadahController@getdataibadah',
        'as' => 'ajax.get.data.ibadah',
        ]);
    Route::post('ibadah.hapusibadah', 'RumahIbadahController@hapusibadah')->name('hapusibadah');

    Route::resource('pendidikan','SaranaPendidikanController');
    Route::get('/exportpendidikan', 'SaranaPendidikanController@pendidikanexport');
    Route::get('getdatapendidikan', [
        'uses' => 'SaranaPendidikanController@getdatapendidikan',
        'as' => 'ajax.get.data.pendidikan',
        ]);
    Route::post('pendidikan.hapuspendidikan', 'SaranaPendidikanController@hapuspendidikan')->name('hapuspendidikan');

    Route::resource('kesehatan','SaranaKesehatanController');
    Route::get('/exportkesehatan','SaranaKesehatanController@kesehatanexport');
    Route::get('getdatakesehatan', [
        'uses' => 'SaranaKesehatanController@getdatakesehatan',
        'as' => 'ajax.get.data.kesehatan',
        ]);
    Route::post('kesehatan.hapuskesehatan', 'SaranaKesehatanController@hapuskesehatan')->name('hapuskesehatan');

    Route::resource('covid19','Covid19Controller');
    Route::get('getdatacovid19', [
        'uses' => 'Covid19Controller@getdatacovid19',
        'as' => 'ajax.get.data.covid19',
        ]);
    Route::post('covid19.hapus', 'Covid19Controller@hapus')->name('hapus');
    Route::get('/exportcovid19', 'Covid19Controller@covid19export');
    Route::get('/chartcovid19', 'Covid19Controller@covid19chart');
});

Route::group(['middleware' => ['auth','checkrole:superadmin,admin,user,pemtibum']],function(){
    // Route::resource('warga','WargaController');

    Route::resource('ktp','KtpController');
    Route::patch('/ktp/{ktp}', 'KtpController@update');
    Route::get('getdataktp', [
        'uses' => 'KtpController@getdataktp',
        'as' => 'ajax.get.data.ktp',
        ]);
    Route::post('ktp.hapusktp', 'KtpController@hapusktp')->name('hapusktp');
    
    Route::get('/exportkependudukan', 'KependudukanController@exportkependudukan');
    Route::resource('kependudukan','KependudukanController'); //JUMLAH PENDUDUK BY ANGKA
    Route::get('getdatakependudukan', [
        'uses' => 'KependudukanController@getdatakependudukan',
        'as' => 'ajax.get.data.kependudukan',
        ]);
    Route::post('kependudukan.hapuskependudukan', 'KependudukanController@hapuskependudukan')->name('hapuskependudukan');

    // Route::resource('rtrw','RtrwController');

    Route::resource('ksbrt','ksbrtController');
    Route::get('getdataksbrt', [
        'uses' => 'ksbrtController@getdataksbrt',
        'as' => 'ajax.get.data.ksbrt',
        ]);
    Route::post('ksbrt.hapusksbrt', 'ksbrtController@hapusksbrt')->name('hapusksbrt');

    Route::resource('ksbrw','ksbrwController');
    Route::get('getdataksbrw', [
        'uses' => 'ksbrwController@getdataksbrw',
        'as' => 'ajax.get.data.ksbrw',
        ]);
    Route::post('ksbrw.hapusksbrw', 'ksbrwController@hapusksbrw')->name('hapusksbrw');

    Route::get('/exportksbrt', 'ksbrtController@ksbrtexport');
    Route::get('/exportksbrw', 'ksbrwController@ksbrwexport');
});

Route::group(['middleware' => ['auth','checkrole:superadmin,admin,user,permasbang']],function(){
    Route::resource('fasosfasum','FasosfasumController');
    Route::get('getdatafasosfasum', [
        'uses' => 'FasosfasumController@getdatafasosfasum',
        'as' => 'ajax.get.data.fasosfasum',
        ]);
    Route::post('fasosfasum.hapusfasosfasum', 'FasosFasumController@hapusfasosfasum')->name('hapusfasosfasum');
    Route::get('/exportfasosfasum', 'FasosfasumController@fasosfasumexport');

    Route::resource('pbb','PbbController');
    Route::get('getdatapbb', [
        'uses' => 'PbbController@getdatapbb',
        'as' => 'ajax.get.data.pbb',
        ]);
    Route::post('pbb.hapuspbb', 'PbbController@hapuspbb')->name('hapuspbb');
    Route::get('/exportpbb', 'PbbController@pbbexport');
});

// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
