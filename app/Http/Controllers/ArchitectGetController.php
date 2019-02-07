<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App;
use App\ArchitectUploadModel;

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

     // public function display_image_all($id) {
     		
     // 		$model = new ArchitectUploadModel();

     //  	$display_image_all = $model::findOrFail($id);

     //    	$response = [
     //    		'display_image_all' => $display_image_all
     //    	];

     //    	return response()->json($response);

     // }

      public function fetchMainImage($id) {

   		
   		$model = new ArchitectUploadModel();

    	$display_image_all = $model::findOrFail($id);

      	$response = [
      		'display_image_all' => $display_image_all
      	];

      	return response()->json($response);

   }
}
