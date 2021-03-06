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


Route::group(['middleware' => ['auth:api']], function(){
    // Users
    Route::get('users', 'UserController@index')->middleware('isArchitect');
    Route::get('users/{id}', 'UserController@show')->middleware('isArchitectOrSelf');

    //Architect Upload Portfolio
    Route::post('architect/upload_portfolio','ArchitectPostController@upload_portfolio')->middleware('isArchitect');
    //Interior Upload Portfolio
    Route::post('interior/upload_portfolio','InteriorPostController@upload_portfolio')->middleware('isInterior');

    //SuperAdmin Upload Furniture & Accessories
    Route::post('super_admin/upload_furniture_accessories','AdminPostController@upload_furniture_accessories')->middleware('isSuperAdmin');

    //Architect Display All Portfolio
    Route::get('/architect/display_portfolio_all/{type}/{id?}','ArchitectGetController@display_portfolio_all')->middleware('isArchitect');
    //Interior Display All Portfolio
    Route::get('/interior/display_portfolio_all/{type}/{id?}','InteriorGetController@display_portfolio_all')->middleware('isInterior');
    //Super_admin Display All furnitures & accessories
    Route::get('/super_admin/display_furnitures_accessories/{type}/{id?}','AdminGetController@display_furnituresAccessories_all')->middleware('isSuperAdmin');

    //Architect Delete Portfolio
    Route::post('/architect/delete_portfolio/{id?}','ArchitectPostController@delete_portfolio')->middleware('isArchitect');
    //Interior Delete Portfolio
    Route::post('/interior/delete_portfolio/{id?}','InteriorPostController@delete_portfolio')->middleware('isInterior');
    //Super_admin Delete Product
    Route::post('/super_admin/delete_product/{id?}','AdminPostController@delete_product')->middleware('isSuperAdmin');



    //Architect Display Portfolio
    Route::get('/architect/display_portfolio/{id?}','ArchitectGetController@display_portfolio')->middleware('isArchitect');
    //Interior Display Portfolio
    Route::get('/interior/display_portfolio/{id?}','InteriorGetController@display_portfolio')->middleware('isInterior');

     //Architect Display Image All Edit mode
    // Route::get('/architect/display_image_all/{id}','ArchitectGetController@display_image_all')->middleware('isArchitect');


    //Architect Update Portfolio
    Route::post('architect/update_portfolio/{id}','ArchitectPostController@update_portfolio')->middleware('isArchitect');
    //Architect Update Profile
    Route::post('architect/update_profile/','ArchitectPostController@update_profile')->middleware('isArchitect');
    //Constructor Update Profile
    Route::post('constructor/update_profile/','ConstructorPostController@update_profile')->middleware('isConstructor');
    //Interior Update Profile
    Route::post('interior/update_profile/','InteriorPostController@update_profile')->middleware('isInterior');
    //Interior Update Portfolio
    Route::post('interior/update_portfolio/{id}','InteriorPostController@update_portfolio')->middleware('isInterior');
    //Super admin Update product
    Route::post('super_admin/update_product/{id}','AdminPostController@update_product')->middleware('isSuperAdmin');

    //Architects display all portfolio
    Route::get('architects/portfolio_showcase/{type}/{id?}', 'ArchitectGetController@architects_portfolio_showcase');

    //Architect display all details per portfolio
    Route::get('architects/details_per_portfolio/{id}', 'ArchitectGetController@architects_details_per_portfolio');

    //Super_admin display all details per furnitures & accessories
    Route::get('super_admin/details_per_furnituresAccessories/{id}', 'AdminGetController@super_admin_details_per_furnituresAccessories');


    //Architect display all portfolio without image
    Route::get('architect/all_portfolio/', 'ArchitectGetController@architect_all_portfolio')->middleware('isArchitect');;

    //Interior display all portfolio without image
    Route::get('interior/all_portfolio/', 'ArchitectGetController@interior_all_portfolio')->middleware('isInterior');



     //Architect display design total area
    Route::get('architects/design_area_total/{id}', 'ArchitectGetController@design_area_total');



    //Architect save profile
    Route::post('profile_info/architect/','ArchitectPostController@save_architect_profile')->middleware('isArchitect');
    //Interior save profile
    Route::post('profile_info/interior/','ArchitectPostController@save_interior_profile')->middleware('isInterior');
    //Constructor save profile
    Route::post('profile_info/constructor/','ConstructorPostController@save_constructor_profile')->middleware('isConstructor');
    //User save profile
    Route::post('profile_info/user/','UserController@save_user_profile');
    //Show architect profile
    Route::get('architects/show_profile/{id}','ArchitectGetController@show_architect_profile')->middleware('isArchitect');
    //Show constructor profile
    Route::get('constructor/show_profile/{id}','ConstructorGetController@show_constructor_profile')->middleware('isConstructor');
    //Show architect profile
    Route::get('interiors/show_profile/{id}','InteriorGetController@show_interior_profile')->middleware('isInterior');

    //Show user profile
    Route::get('users/show_profile/{id}','UserController@show_user_profile');


   
    //Get username architect
    Route::get('/architect/username/','ArchitectGetController@get_architect_username');
    //Get username interior
    Route::get('/interior/username/','InteriorGetController@get_interior_username');
    //Get username individuals
    Route::get('/user/info/','UserController@get_individuals_username');

    //Generate code for designer account
    Route::get('/add_account/generate_code/','AdminGetController@generate_code')->middleware('isSuperAdmin');
    //Save designer account
    Route::post('/designer/save_account/','AdminPostController@save_designer_account')->middleware('isSuperAdmin');


    Route::get('/display_all/architects/','AdminGetController@list_of_all_architects');

    Route::get('/display_all/interiors/','AdminGetController@list_of_all_interiors');

    Route::get('/display_all/individuals/','AdminGetController@list_of_all_individuals');

    Route::get('/display_all/not_verified_users/','AdminGetController@list_of_all_not_verified_users');

    //SEARCH SECTION
    Route::get('/list_residential_architecture/building_designs/{search}','UserController@list_of_building_designs_residential_architecture');

    Route::get('/list_institutional_architecture/building_designs/{search}','UserController@list_of_building_designs_institutional_architecture');

    Route::get('/list_hospitality_architecture/building_designs/{search}','UserController@list_of_building_designs_hospitality_architecture');

    Route::get('/list_commercial_architecture/building_designs/{search}','UserController@list_of_building_designs_commercial_architecture');

    Route::get('/list_residential_interior/building_designs/{search}','UserController@list_of_building_designs_residential_interior');

    Route::get('/list_institutional_interior/building_designs/{search}','UserController@list_of_building_designs_institutional_interior');

    Route::get('/list_hospitality_interior/building_designs/{search}','UserController@list_of_building_designs_hospitality_interior');

    Route::get('/list_commercial_interior/building_designs/{search}','UserController@list_of_building_designs_commercial_interior');

    Route::get('/list_furnitures_accessories/furnitures_accessories_designs/{search}','AdminGetController@list_of_furnitures_accessories_designs');

    Route::get('/list_all/building_designs/{search}','AdminGetController@list_of_all_building_designs');
    //END OF SEARCH SECTION

    //Architect change email
    Route::post('architect/change_email/','ArchitectPostController@change_architect_email')->middleware('isArchitect');
    //Architect change password
    Route::post('architect/change_password/','ArchitectPostController@change_architect_password')->middleware('isArchitect');
    //Interior change email
    Route::post('interior/change_email/','InteriorPostController@change_interior_email')->middleware('isInterior');
    //Interior change password
    Route::post('interior/change_password/','InteriorPostController@change_interior_password')->middleware('isInterior');
    //Constructor change email
    Route::post('constructor/change_email/','ConstructorPostController@change_constructor_email')->middleware('isConstructor');
    //Constructor change password
    Route::post('constructor/change_password/','ConstructorPostController@change_constructor_password')->middleware('isConstructor');
    //Individuals change email
    Route::post('individuals/change_email/','UserController@change_individuals_email');
    //Individuals change password
    Route::post('individuals/change_password/','UserController@change_individuals_password');

});

    //User question
    Route::post('user/question/','UserController@question');

 
    //Designer verification
    Route::post('/designers/verification/','AdminPostController@designer_verification');
    //Designer set password
    Route::post('/designers/set_password/','AdminPostController@designer_set_password');
    //Architects display all portfolio
    Route::get('architects/portfolio_showcase/{type}/{id?}','ArchitectGetController@architects_portfolio_showcase');
    //Super Admin display all furnitures and accessories
    Route::get('super_admin/display_all_furnitures_accessories/{type}/{id?}','AdminGetController@super_admin_display_all_furnitures_accessories');
    //Super Admin display all building designs
    Route::get('super_admin/list_of_all__building_designs/{type}/{id?}','AdminGetController@super_admin_display_all_building_designs');
    //Super Admin display all building designs
    Route::get('super_admin/list_of_all__building_designs1/{id?}','AdminGetController@super_admin_display_all_building_designs1');

     //Display all furnitures & accessories
    Route::get('display/product_showcase/{type}/{id?}', 'AdminGetController@display_product_showcase');

     //Architect display all details per portfolio
    Route::get('architects/details_per_portfolio/{id}', 'ArchitectGetController@architects_details_per_portfolio');

    //Display all details per product
    Route::get('display/details_per_product/{id}', 'AdminGetController@display_details_per_product');

    //Architect display design total area
    Route::get('architects/design_area_total/{id}', 'ArchitectGetController@design_area_total');

        //SEARCH SECTION
    Route::get('/list_residential_architecture/building_designs/{search}','UserController@list_of_building_designs_residential_architecture');

    Route::get('/list_institutional_architecture/building_designs/{search}','UserController@list_of_building_designs_institutional_architecture');

    Route::get('/list_hospitality_architecture/building_designs/{search}','UserController@list_of_building_designs_hospitality_architecture');

    Route::get('/list_commercial_architecture/building_designs/{search}','UserController@list_of_building_designs_commercial_architecture');

    Route::get('/list_residential_interior/building_designs/{search}','UserController@list_of_building_designs_residential_interior');

    Route::get('/list_institutional_interior/building_designs/{search}','UserController@list_of_building_designs_institutional_interior');

    Route::get('/list_hospitality_interior/building_designs/{search}','UserController@list_of_building_designs_hospitality_interior');

    Route::get('/list_commercial_interior/building_designs/{search}','UserController@list_of_building_designs_commercial_interior');

    Route::get('/list_furnitures_accessories_p/furnitures_accessories_designs/{search}','UserController@list_of_furnitures_accessories_designs_p');

    Route::get('/list_of_all_designs/building_designs/{search}','UserController@list_of_all_building_designs');
 
        //END OF SEARCH SECTION