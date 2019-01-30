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



Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('refresh', 'AuthController@refresh');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('user', 'AuthController@user');
        Route::post('logout', 'AuthController@logout');
    });
});

Route::group(['middleware' => 'auth:api'], function(){
    // Users
    Route::get('users', 'UserController@index')->middleware('isAdmin');
    Route::get('users/{id}', 'UserController@show')->middleware('isAdminOrSelf');

    //Architect Upload Portfolio
    Route::post('architect/upload_portfolio','ArchitectPostController@upload_portfolio')->middleware('isAdmin');
    //Architect Display All Portfolio
    Route::get('/architect/display_portfolio_all/{type}/{id?}','ArchitectGetController@display_portfolio_all')->middleware('isAdmin');
    //Architect Delete Portfolio
    Route::post('/architect/delete_portfolio/{id?}','ArchitectPostController@delete_portfolio')->middleware('isAdmin');



    //Architect Display Portfolio
    Route::get('/architect/display_portfolio/{id?}','ArchitectGetController@display_portfolio')->middleware('isAdmin');
     //Architect Display Image All Edit mode
    Route::get('/architect/display_image_all/{id?}','ArchitectGetController@display_image_all')->middleware('isAdmin');


     






    /*UPDATE IMAGE IN PORTFOLIO SECTION*/

    // Route::post('architect/update_main_image','ArchitectPostController@update_main_image')->middleware('isAdmin');


});