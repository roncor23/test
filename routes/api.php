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
    Route::get('users', 'UserController@index')->middleware('isArchitect');
    Route::get('users/{id}', 'UserController@show')->middleware('isArchitectOrSelf');

    //Architect Upload Portfolio
    Route::post('architect/upload_portfolio','ArchitectPostController@upload_portfolio')->middleware('isArchitect');
    //Architect Display All Portfolio
    Route::get('/architect/display_portfolio_all/{type}/{id?}','ArchitectGetController@display_portfolio_all')->middleware('isArchitect');
    //Architect Delete Portfolio
    Route::post('/architect/delete_portfolio/{id?}','ArchitectPostController@delete_portfolio')->middleware('isArchitect');



    //Architect Display Portfolio
    Route::get('/architect/display_portfolio/{id?}','ArchitectGetController@display_portfolio')->middleware('isArchitect');

     //Architect Display Image All Edit mode
    // Route::get('/architect/display_image_all/{id}','ArchitectGetController@display_image_all')->middleware('isArchitect');


    //Architect Update Portfolio
    Route::post('architect/update_portfolio/{id}','ArchitectPostController@update_portfolio')->middleware('isArchitect');



    //Architects display all portfolio
    Route::get('architects/portfolio_showcase/{type}/{id?}', 'ArchitectGetController@architects_portfolio_showcase');


     //Architect display all details per portfolio
    Route::get('architects/details_per_portfolio/{id}', 'ArchitectGetController@architects_details_per_portfolio');


     //Architect display all portfolio without image
    Route::get('architect/all_portfolio/', 'ArchitectGetController@architect_all_portfolio');
    //Architect display lower_bedrooms_bollean
    Route::get('architects/design_lower_bedrooms/{id}', 'ArchitectGetController@architect_design_lower_bedrooms');
    //Architect display walk_in_closet_bollean
    Route::get('architects/design_walk_in_closet/{id}', 'ArchitectGetController@architect_design_walk_in_closet');




});

    //Architects display all portfolio
    Route::get('architects/portfolio_showcase/{type}/{id?}', 'ArchitectGetController@architects_portfolio_showcase');
     //Architect display all details per portfolio
    Route::get('architects/details_per_portfolio/{id}', 'ArchitectGetController@architects_details_per_portfolio');
      //Architect display lower_bedrooms_bollean
    Route::get('architects/design_lower_bedrooms/{id}', 'ArchitectGetController@architect_design_lower_bedrooms');
    //Architect display walk_in_closet_bollean
    Route::get('architects/design_walk_in_closet/{id}', 'ArchitectGetController@architect_design_walk_in_closet');