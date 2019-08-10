<?php

namespace App\Http\Controllers;

// include ("../vendor/autoload.php");

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App;
use App\FurnituresAccessoriesModel;
use App\ArchitectUploadModel;
use App\User;
use App\AddDesignerAccountModel;


use DB;



use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2x;

class AdminGetController extends Controller
{
    public function generate_code() {
    	 /*FOR DESIGN CODE START*/
            $random_number = mt_rand(10,1000);
            $designNumber = 1;


            $lastDesignNumber = 1; 


            if($designNumber < 9999) {

              $designNumber = $lastDesignNumber + 1;

            }else{
             $designNumber = 1;
            } 

            $designCode = $random_number .  '-' . $designNumber;

            $hide = md5($designCode);
        /*FOR DESIGN CODE END*/


         return response()->json($hide);
    }


   public function display_furnituresAccessories_all($type, $id = null) {

        $model = new FurnituresAccessoriesModel();

        if (!is_null($id)) {
            $response = $model::findOrFail($id);
        } else {
            $records_per_page = ($type == 'video') ? 6 : 3;

            $products = $model::where('type', $type)
                            ->where('user_id', Auth::id())
                            ->orderBy('id', 'desc')->paginate($records_per_page);            

            $response = [
                'pagination' => [
                    'total' => $products->total(),
                    'per_page' => $products->perPage(),
                    'current_page' => $products->currentPage(),
                    'last_page' => $products->lastPage(),
                    'from' => $products->firstItem(),
                    'to' => $products->lastItem()
                ],
                'data' => $products

            ];
        }

        return response()->json($response);
   }

    public function super_admin_details_per_furnituresAccessories($id) {

          $model = new FurnituresAccessoriesModel();

          $details_per_furnituresAccessories = $model::findOrFail($id);


          $response = [
            'details_per_furnituresAccessories' => $details_per_furnituresAccessories
          ];

        return response()->json($response);
  }

     public function display_product_showcase($type, $id = null) {
    
       $model = new FurnituresAccessoriesModel();

        if (!is_null($id)) {
            $response = $model::findOrFail($id);
        } else {
            $records_per_page = ($type == 'video') ? 6 : 6;

            $files = $model::where('type', $type)
                            ->orderBy('id', 'desc')->paginate($records_per_page);
            $response = [
                
                'pagination' => [
                    'total' => $files->total(),
                    'per_page' => $files->perPage(),
                    'current_page' => $files->currentPage(),
                    'last_page' => $files->lastPage(),
                    'from' => $files->firstItem(),
                    'to' => $files->lastItem()
                ],
                'data' => $files

            ];

        }

        return response()->json($response);
   }

      public function display_details_per_product($id) {

          $model = new FurnituresAccessoriesModel();

          $details_per_product = $model::findOrFail($id);


          $response = [
            'details_per_product' => $details_per_product
          ];

        return response()->json($response);
  }

     public function super_admin_display_all_furnitures_accessories($type, $id = null) {
    
       $model = new FurnituresAccessoriesModel();

        if (!is_null($id)) {
            $response = $model::findOrFail($id);
        } else {
            $records_per_page = ($type == 'video') ? 6 : 6;

            $files = $model::where('type', $type)
                            ->orderBy('id', 'desc')->paginate($records_per_page);
            $response = [
                
                'pagination' => [
                    'total' => $files->total(),
                    'per_page' => $files->perPage(),
                    'current_page' => $files->currentPage(),
                    'last_page' => $files->lastPage(),
                    'from' => $files->firstItem(),
                    'to' => $files->lastItem()
                ],
                'data' => $files

            ];

        }

        return response()->json($response);
   }

        public function super_admin_display_all_building_designs($type, $id = null) {
    
       $model = new ArchitectUploadModel();

        if (!is_null($id)) {
            $response = $model::findOrFail($id);
        } else {
            $records_per_page = ($type == 'video') ? 6 : 6;

            $files = $model::where('user_name', 'Architect')
                            ->orderBy('id', 'desc')->paginate($records_per_page);
            $response = [
                
                'pagination' => [
                    'total' => $files->total(),
                    'per_page' => $files->perPage(),
                    'current_page' => $files->currentPage(),
                    'last_page' => $files->lastPage(),
                    'from' => $files->firstItem(),
                    'to' => $files->lastItem()
                ],
                'data' => $files

            ];

        }

        return response()->json($response);
   }

    public function super_admin_display_all_building_designs1($type, $id = null) {
    
       $model = new ArchitectUploadModel();

        if (!is_null($id)) {
            $response = $model::findOrFail($id);
        } else {
            $records_per_page = ($type == 'video') ? 6 : 6;

            $files = $model::where('user_name', 'Interior')
                            ->orderBy('id', 'desc')->paginate($records_per_page);
            $response = [
                
                'pagination' => [
                    'total' => $files->total(),
                    'per_page' => $files->perPage(),
                    'current_page' => $files->currentPage(),
                    'last_page' => $files->lastPage(),
                    'from' => $files->firstItem(),
                    'to' => $files->lastItem()
                ],
                'data' => $files

            ];

        }

        return response()->json($response);
   }

    public function list_of_furnitures_accessories_designs($search) {

        $designs = new FurnituresAccessoriesModel();

        $list = $designs::where('floor_plan_code', $search)
                        ->where('type', 'furnituresAccessories')
                        ->get();

        if(sizeof($list)==0) {

            $erro = "Search not found!";

            return response()->json($erro);
        }

        return response()->json($list);

    }

      public function list_of_all_building_designs($search) {

        $designs = new ArchitectUploadModel();

        $list = $designs::where('floor_plan_code', $search)
                        ->get();

        if(sizeof($list)==0) {

            $erro = "Search not found!";

            return response()->json($erro);
        }

        return response()->json($list);

    }

    public function list_of_all_architects() {

        $architects = new User();

        $list_of_all_architects = DB::table('users')
            ->where('role', 2)
            ->join('architect_profile_models', 'users.id', '=', 'architect_profile_models.admin_id')
            ->select('users.*', 'architect_profile_models.full_name', 'architect_profile_models.phone', 'architect_profile_models.address','architect_profile_models.address2','architect_profile_models.city_town','architect_profile_models.state_country_province','architect_profile_models.postcode','architect_profile_models.country','architect_profile_models.birthday')
            ->get();

        return response()->json($list_of_all_architects);

    }

    public function list_of_all_interiors() {

        $interiors = new User();

        $list_of_all_interiors = DB::table('users')
            ->where('role', 4)
            ->join('architect_profile_models', 'users.id', '=', 'architect_profile_models.admin_id')
            ->select('users.*', 'architect_profile_models.full_name', 'architect_profile_models.phone', 'architect_profile_models.address','architect_profile_models.address2','architect_profile_models.city_town','architect_profile_models.state_country_province','architect_profile_models.postcode','architect_profile_models.country','architect_profile_models.birthday')
            ->get();

        return response()->json($list_of_all_interiors);

    }

    public function list_of_all_individuals() {


        $list_of_all_individuals = DB::table('users')
            ->where('role', 1)
            ->join('architect_profile_models', 'users.id', '=', 'architect_profile_models.admin_id')
            ->select('users.*', 'architect_profile_models.full_name', 'architect_profile_models.phone', 'architect_profile_models.address','architect_profile_models.address2','architect_profile_models.city_town','architect_profile_models.state_country_province','architect_profile_models.postcode','architect_profile_models.country','architect_profile_models.birthday')
            ->get();

        return response()->json($list_of_all_individuals);

    }

    public function list_of_all_not_verified_users() {

        $not_verified_users = new AddDesignerAccountModel();

        $list_of_all_not_verified_users = $not_verified_users::all();

        return response()->json($list_of_all_not_verified_users);

    }

}
