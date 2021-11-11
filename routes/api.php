<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'dashboard'], function () {

    Route::prefix('blog')->group(function () {

        Route::get('/', 'Dashboard\BlogController@index');
        Route::get('/all', 'Dashboard\BlogController@getAllBlogs');

        Route::get('/show/{id}', 'Dashboard\BlogController@show');
    });
    Route::get('/allQuest', 'EstmatorController@allQuest');
    Route::get('/quest', 'EstmatorController@quest');


    Route::apiResource('/category', 'Dashboard\CategoryController');
    Route::get('/categories/{category}/blogs', 'Dashboard\CategoryController@filter')->name('Category.Filter');
});
