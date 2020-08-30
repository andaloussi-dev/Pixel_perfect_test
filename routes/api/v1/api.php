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

Route::prefix('/user')->group(function(){
    Route::post('/login','Api/V1/loginController@login');

});
// customerApi routes
Route::group(['prefix'=>'/customer'],function(){
    Route::group(['middleware'=>'auth:api'],function(){
    Route::get('/','Api/V1/apiCustomerController@index')->middleware('scope:customer-privilege');
    Route::post('/create','Api/V1/apiCustomerController@create')->middleware('scope:customer-privilege');
    Route::get('/issue{id}','Api/V1/apiCustomerController@show')->middleware('scope:customer-privilege');

    });
      
});


// admin api

Route::group(['prefix'=>'/admin'],function(){
    Route::group(['middleware'=>'auth:api'],function(){
    Route::get('/','Api/V1/apiAdminController@index')->middleware('scope:admin-privilege');
    Route::put('/edit','Api/V1/apiAdminController@update')->middleware('scope:admin-privilege');
    Route::get('/issue{id}','Api/V1/apiAdminController@show')->middleware('scope:customer-privilege');
    Route::delete('/issue{id}','Api/V1/apiAdminController@destroy')->middleware('scope:admin-privilege');

    });
      
});


