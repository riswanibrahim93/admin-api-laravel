<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelolaArtikelController;
use App\Http\Controllers\KelolaYoutubeController;
use App\Http\Controllers\KelolaPsikologController;

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

Route::group(['middleware' => 'auth'], function(){
    Route::resource('/dataArtikel', 'KelolaArtikelController');
    Route::resource('/dataYoutube', 'KelolaYoutubeController');
    Route::resource('/dataPsikolog', 'KelolaPsikologController');
});
