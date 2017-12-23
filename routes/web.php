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
use App\Http\Middleware\CheckAge;

Route::get('/', function () {
    return view('welcome');
})->middleware(CheckAge::class);

Route::get('/tracy', function () {
    throw new \Exception('Tracy works!');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'login/social','middleware'=>['guest']],function(){
    Route::get('{provider}/redirect', 'Auth\SocialController@getSocialRedirect')->name('social.redirect');
    Route::get('{provider}/callback', 'Auth\SocialController@getSocialCallback')->name('social.callback');
});
