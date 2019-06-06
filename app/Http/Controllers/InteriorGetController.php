<?php

namespace App\Http\Controllers;

include ("../vendor/autoload.php");

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App;
use App\ArchitectUploadModel;
use App\ArchitectProfileModel;
use App\CheckOutModel;
use App\User;


use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2x;

class InteriorGetController extends Controller
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

  public function get_user_info() {

          $model = new User();

          $details_per_user = $model::where('id', Auth::id())
                              ->get();


        return response()->json($details_per_user);
   }


      public function display_portfolio($id) {

   		$model = new ArchitectUploadModel();

    	$display_portfolio = $model::findOrFail($id);

      	$response = [
      		'display_portfolio' => $display_portfolio
      	];

      	return response()->json($response);
   }

   public function show_interior_profile($id) {

      $model = new ArchitectProfileModel();

      $profile_per_interior = $model::where('admin_id', Auth::id())->first();


      $response = [
        'profile_per_interior' => $profile_per_interior
      ];

        return response()->json($response);

  }

}
