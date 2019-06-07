<?php

namespace App\Http\Controllers;

include ("../vendor/autoload.php");

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App;
use App\FurnituresAccessoriesModel;



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


         return response()->json($test);
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

}
