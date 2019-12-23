<?php

use Illuminate\Http\Request;

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

/* cors origin  */
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept,Authorization ");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, PATCH, DELETE");

// posts
Route::apiResource('posts', 'PostController');
Route::apiResource('category', 'CategoryController');

// Get all post count
Route::get('/count','PostController@count');


/* auth route */
Route::post('login', 'API\AuthController@login');
Route::post('register', 'API\AuthController@register');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


