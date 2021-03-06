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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

use Http\Controllers\Api\ApiDocsController;

Route::post('/login', 'API\AuthController@login')->name('login');

Route::middleware('auth:api')->group(function () {
    Route::apiResource('/users', 'UsersController');
//Route::apiResource('/docs', 'ApiDocsController');
    Route::apiResource('/docs', 'API\ApiDocsController');
    Route::apiResource('/info', 'API\InfoController');
    Route::get('/logout', 'API\AuthController@logout')->name('logout');
});
