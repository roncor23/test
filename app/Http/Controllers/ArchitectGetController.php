<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App;
use App\ArchitectUploadModel;
use App\CheckOutModel;
use App\User;

class ArchitectGetController extends Controller
{
   public function display_portfolio_all($type, $id = null) {

   		$model = new ArchitectUploadModel();

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

   public function architects_details_per_portfolio($id) {

          $model = new ArchitectUploadModel();

          $details_per_portfolio = $model::findOrFail($id);


          $response = [
            'details_per_portfolio' => $details_per_portfolio
          ];

        return response()->json($response);
  }

  public function architect_all_portfolio() {

       $model = new ArchitectUploadModel();

       $display_allPortfolio = $model::all();

        return response()->json($display_allPortfolio);
  }


  public function display_reserved_design() {

      $model = new CheckOutModel();

      $display_reserved_design = $model::all();

      return response()->json($display_reserved_design);
  }

  public function reserved_design_per_architect() {

      $model = new CheckOutModel();

      $model1 = new User();


      $architect_user = $model1::where('id', Auth::id())->first();

      $designer_name = $architect_user['name'];

      $display_reserved_design_per_designer = $model::where('designer_name', $designer_name)
                                            ->orderBy('billing_name', 'desc')
                                            ->get(); 

       return response()->json($display_reserved_design_per_designer);

  }

  public function architect_design_lower_bedrooms($id) {

       $model = new ArchitectUploadModel();

       $architect_user = $model::where('id', $id)->first();

       $lower_bedrooms = $architect_user['lower_level_bedrooms'];

       return response()->json($lower_bedrooms);


  }

   public function architect_design_walk_in_closet($id) {

       $model = new ArchitectUploadModel();

       $architect_user = $model::where('id', $id)->first();

       $walk_in_closet = $architect_user['walk_in_closet'];

       return response()->json($walk_in_closet);


  }

  public function design_area_total($id) {

       $model = new ArchitectUploadModel();

       $architect_user = $model::where('id', $id)->first();

       $main_floor_area = $architect_user['main_floor_area'];

       $lower_floor_area = $architect_user['lower_floor_area'];

       $total_area = $main_floor_area + $lower_floor_area;

       return response()->json($total_area);
  }

   public function architects_portfolio_showcase($type, $id = null) {
    
       $model = new ArchitectUploadModel();

        if (!is_null($id)) {
            $response = $model::findOrFail($id);
        } else {
            $records_per_page = ($type == 'video') ? 6 : 3;

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

   public function display_portfolio($id) {

   		$model = new ArchitectUploadModel();

    	$display_portfolio = $model::findOrFail($id);

      	$response = [
      		'display_portfolio' => $display_portfolio
      	];

      	return response()->json($response);
   }


}
