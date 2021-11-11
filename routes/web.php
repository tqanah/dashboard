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


Auth::routes();

Route::get('/', 'HomeController@index');




Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::group(['prefix' => 'dashboard',  'middleware' => 'auth'],function () {
    Route::Resource('estimate', 'EstmatorController');

    Route::prefix('blog')->group(function () {
        Route::get('/','Dashboard\BlogController@index');
        Route::get('/create','Dashboard\BlogController@create');
        Route::get('/showBlog/{id}','Dashboard\BlogController@showBlog');
        Route::post('/store','Dashboard\BlogController@store')->name('blog.store');
    });

    Route::post('/upload','UploadController@store');




});

/*Route::get('/{any}',function (){
    return view('dashboard.home');
})->where('any','.*');*/
