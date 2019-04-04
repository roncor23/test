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

Route::group(['middleware' => ['auth:api','cors']], function(){
    // Users
    Route::get('users', 'UserController@index')->middleware('isArchitect');
    Route::get('users/{id}', 'UserController@show')->middleware('isArchitectOrSelf');

    //Architect Upload Portfolio
    Route::post('architect/upload_portfolio','ArchitectPostController@upload_portfolio')->middleware('isArchitect');
    //Architect Upload Portfolio
    Route::post('interior/upload_portfolio','ArchitectPostController@upload_portfolio')->middleware('isInterior');

    //Architect Display All Portfolio
    Route::get('/architect/display_portfolio_all/{type}/{id?}','ArchitectGetController@display_portfolio_all')->middleware('isArchitect');
    //Interior Display All Portfolio
    Route::get('/interior/display_portfolio_all/{type}/{id?}','ArchitectGetController@display_portfolio_all')->middleware('isInterior');

    //Architect Delete Portfolio
    Route::post('/architect/delete_portfolio/{id?}','ArchitectPostController@delete_portfolio')->middleware('isArchitect');



    //Architect Display Portfolio
    Route::get('/architect/display_portfolio/{id?}','ArchitectGetController@display_portfolio')->middleware('isArchitect');
    //Interior Display Portfolio
    Route::get('/interior/display_portfolio/{id?}','ArchitectGetController@display_portfolio')->middleware('isInterior');

     //Architect Display Image All Edit mode
    // Route::get('/architect/display_image_all/{id}','ArchitectGetController@display_image_all')->middleware('isArchitect');


    //Architect Update Portfolio
    Route::post('architect/update_portfolio/{id}','ArchitectPostController@update_portfolio')->middleware('isArchitect');
    //Interior Update Portfolio
    Route::post('interior/update_portfolio/{id}','ArchitectPostController@update_portfolio')->middleware('isInterior');



    //Architects display all portfolio
    Route::get('architects/portfolio_showcase/{type}/{id?}', 'ArchitectGetController@architects_portfolio_showcase');


     //Architect display all details per portfolio
    Route::get('architects/details_per_portfolio/{id}', 'ArchitectGetController@architects_details_per_portfolio');


     //Architect display all portfolio without image
    Route::get('architect/all_portfolio/', 'ArchitectGetController@architect_all_portfolio')->middleware('isArchitect');;

     //Interior display all portfolio without image
    Route::get('interior/all_portfolio/', 'ArchitectGetController@interior_all_portfolio')->middleware('isInterior');


    //Architect display lower_bedrooms_bollean
    Route::get('architects/design_lower_bedrooms/{id}', 'ArchitectGetController@architect_design_lower_bedrooms');
    //Architect display walk_in_closet_bollean
    Route::get('architects/design_walk_in_closet/{id}', 'ArchitectGetController@architect_design_walk_in_closet');
     //Architect display design total area
    Route::get('architects/design_area_total/{id}', 'ArchitectGetController@design_area_total');

     Route::get('test/try/', 'ArchitectGetController@test');

     //Architect reserve design list
    Route::post('architect_interior/reserve_design/{id}','ArchitectPostController@reserve_design');


     //Super admin display reserved design
    Route::get('/individual/reserved_design/','ArchitectGetController@display_reserved_design')->middleware('isSuperAdmin');
    //Display reserved design per architect
    Route::get('/individual/reserved_design_per_architect/','ArchitectGetController@reserved_design_per_architect')->middleware('isArchitect');
    //Display reserved design per interior
    Route::get('/individual/reserved_design_per_interior/','ArchitectGetController@reserved_design_per_interior')->middleware('isInterior');
    //Display reserved design per architect
    Route::get('/individual/reserved_design_per_user/','ArchitectGetController@reserved_design_per_user');


    //Notification reserved design per user
    Route::get('/notification/noti_reserved_design_per_user/','ArchitectGetController@noti_reserved_design_per_user');
    //Notification reserved design per architect
    Route::get('/notification/noti_reserved_design_per_architect/','ArchitectGetController@noti_reserved_design_per_architect')->middleware('isArchitect');
    //Notification reserved design per admin
    Route::get('/notification/noti_reserved_design_per_admin/','ArchitectGetController@noti_reserved_design_per_admin')->middleware('isSuperAdmin');
    //Notification reserved design per interior
    Route::get('/notification/noti_reserved_design_per_interior/','ArchitectGetController@noti_reserved_design_per_interior')->middleware('isInterior');

    //Reset notification reserved design per user
    Route::get('/notification/reset_noti_reserved_design_per_user/','ArchitectGetController@reset_noti_reserved_design_per_user');
     //Reset notification reserved design per architect
    Route::get('/notification/reset_noti_reserved_design_per_architect/','ArchitectGetController@reset_noti_reserved_design_per_architect')->middleware('isArchitect');

    //Check architect noti
    Route::get('/notification/check_architect_noti/','ArchitectGetController@check_architect_noti')->middleware('isArchitect');

    //Reset notification reserved design per architect
    Route::get('/notification/reset_noti_reserved_design_per_admin/','ArchitectGetController@reset_noti_reserved_design_per_admin')->middleware('isSuperAdmin');
   //Reset notification reserved design per interior
    Route::get('/notification/reset_noti_reserved_design_per_interior/','ArchitectGetController@reset_noti_reserved_design_per_interior')->middleware('isInterior');


    //Notification reserved design per user text
    Route::get('/notification/text_noti_reserved_design_per_user/','ArchitectGetController@reserved_design_per_user');
    //Notification reserved design per architect text
    Route::get('/notification/text_noti_reserved_design_per_architect/','ArchitectGetController@reserved_design_per_architect')->middleware('isArchitect');
    //Notification reserved design per admin text
    Route::get('/notification/text_noti_reserved_design_per_admin/','ArchitectGetController@reserved_design_per_admin')->middleware('isSuperAdmin');
    //Notification reserved design per interior text
    Route::get('/notification/text_noti_reserved_design_per_interior/','ArchitectGetController@reserved_design_per_interior')->middleware('isInterior');
   
    //Get user
    Route::get('/user/info/','ArchitectGetController@get_user_info');




});

    //Architects display all portfolio
    Route::get('architects/portfolio_showcase/{type}/{id?}', 'ArchitectGetController@architects_portfolio_showcase');
     //Architect display all details per portfolio
    Route::get('architects/details_per_portfolio/{id}', 'ArchitectGetController@architects_details_per_portfolio');
      //Architect display lower_bedrooms_bollean
    Route::get('architects/design_lower_bedrooms/{id}', 'ArchitectGetController@architect_design_lower_bedrooms');
    //Architect display walk_in_closet_bollean
    Route::get('architects/design_walk_in_closet/{id}', 'ArchitectGetController@architect_design_walk_in_closet');
    //Architect display design total area
    Route::get('architects/design_area_total/{id}', 'ArchitectGetController@design_area_total');


 