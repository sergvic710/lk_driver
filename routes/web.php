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

/*Route::get('/', function () {
    return view('welcome');
});*/


//Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/docs', 'DocsController@index');
Route::post('/ajaxviewdoc', 'DocsController@setviewdoc');

Route::get('change-password', 'ChangePasswordController@index');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
