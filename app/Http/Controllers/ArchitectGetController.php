<?php

namespace App\Http\Controllers;

// include ("../vendor/autoload.php");

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

class ArchitectGetController extends Controller
{

    public function test() {


      $version = new Version2x("http://localhost:3001");
      $client = new Client($version);

      $client->initialize();

      $client->emit("new_order", ["test1"=>"test1","test2"=>"test2"]);

      $client->close();

      // $model = new ArchitectUploadModel();

      // $test = $model::findOrFail($id);

      // return response()->json($test);
      
    }

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

     public function get_user_info() {

          $model = new User();

          $details_per_user = $model::where('id', Auth::id())->first();

          $name = $details_per_user['name'];


        return response()->json($name);
   }


  public function architect_all_portfolio() {

       $model = new ArchitectUploadModel();

       $display_allPortfolio = $model::all();

        return response()->json($display_allPortfolio);
  }

    public function interior_all_portfolio() {

       $model = new ArchitectUploadModel();

       $display_allPortfolio = $model::all();

        return response()->json($display_allPortfolio);
  }



  public function display_reserved_design() {

      $model = new CheckOutModel();

      $display_reserved_design = $model::all();

      return response()->json($display_reserved_design);
  }

  public function show_architect_profile($id) {

      $model = new ArchitectProfileModel();

      $profile_per_architect = $model::where('admin_id', Auth::id())->first();


      $response = [
        'profile_per_architect' => $profile_per_architect
      ];

        return response()->json($response);

  }


  public function reserved_design_per_user() {

      $model = new CheckOutModel(); 

      $display_reserved_design_info = $model::where('user_id', Auth::id())
                                      ->orderBy('billing_name','desc')
                                      ->get();

      return response()->json($display_reserved_design_info);
  }



  public function noti_reserved_design_per_user() {

      $model = new CheckOutModel(); 

      $noti_display_reserved_design_info = $model::where('noti_user', 1)->count();
                                    

      return response()->json($noti_display_reserved_design_info);
  }

    public function noti_reserved_design_per_architect() {

      $model = new CheckOutModel(); 

      $model1 = new User();

      $architect_user = $model1::findOrFail(Auth::id());

      $name = $architect_user['name'];

      $noti_reserved_design_per_architect = $model::where('noti_architect', 1)
                                            ->where('designer_name', $name)->count();                                                              

      return response()->json($noti_reserved_design_per_architect);
  }

      public function noti_reserved_design_per_interior() {

      $model = new CheckOutModel(); 

      $model1 = new User();

      $interior_user = $model1::findOrFail(Auth::id());

      $name = $interior_user['name'];

      $noti_reserved_design_per_architect = $model::where('noti_interior', 1)
                                            ->where('designer_name', $name)->count();                                                              

      return response()->json($noti_reserved_design_per_architect);
  }

  public function noti_reserved_design_per_admin() {

      $model = new CheckOutModel(); 

      $noti_reserved_design_per_admin = $model::where('noti_admin', 1)->count(); 
                                                                                                        

      return response()->json($noti_reserved_design_per_admin);
  }

  public function reset_noti_reserved_design_per_user() {

    $version = new Version2x("http://localhost:3001");

    $client = new Client($version);

    $client->initialize();

    $model = new CheckOutModel(); 

    $reset_noti_reserved_design_per_user = $model::where('user_id', Auth::id())
                                      ->update(['noti_user' => 0]);
    
    $client->emit("reset_noti_reserved_design_per_user", [$reset_noti_reserved_design_per_user]);

    $client->close();


    return response()->json($reset_noti_reserved_design_per_user);
  }

  public function reset_noti_reserved_design_per_architect() {

      $version = new Version2x("http://localhost:3001"); 

      $client = new Client($version);

      $client->initialize();

      $model = new CheckOutModel(); 

      $model1 = new User();

      $architect_user = $model1::findOrFail(Auth::id());

      $name = $architect_user['name'];

      $designer_name = $model::where('designer_name', $name)->first();

      $d_name = $designer_name['designer_name'];

      if($name == $d_name) {

      $reset_noti_reserved_design_per_user = $model::where('designer_name', $name)
                                      ->update(['noti_architect' => 0]); 
      
      $noti_display_reserved_design_info = $model::where('noti_architect', 1)
                                                  ->where('designer_name', $name)->count();

      $client->emit("reset_noti_reservation_architect", [$noti_display_reserved_design_info]);

      $client->close();
                                 

      return response()->json($reset_noti_reserved_design_per_user);

      }

  }


  public function check_architect_noti() {


      $model = new CheckOutModel(); 

      $model1 = new User();

      $architect_user = $model1::findOrFail(Auth::id());

      $name = $architect_user['name'];

      $reset_noti_reserved_design_per_user = $model::where('designer_name', $name)
                                      ->update(['noti_architect' => 0]);
      
      $noti_display_reserved_design_info = $model::where('noti_architect', 1)->count();
                                  


      return response()->json($noti_display_reserved_design_info);

  }

  public function reset_noti_reserved_design_per_interior() {

      $model = new CheckOutModel(); 

      $model1 = new User();

      $interior_user = $model1::findOrFail(Auth::id());

      $name = $interior_user['name'];

      $reset_noti_reserved_design_per_user = $model::where('designer_name', $name)
                                      ->update(['noti_interior' => 0]);
                                    

      return response()->json($reset_noti_reserved_design_per_user);
  }
    public function reset_noti_reserved_design_per_admin() {

      $model = new CheckOutModel(); 


      $reset_noti_reserved_design_per_admin = $model::where('noti_admin', Auth::id())
                                      ->update(['noti_admin' => 0]);
                                    

      return response()->json($reset_noti_reserved_design_per_admin);
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

  public function reserved_design_per_interior() {

      $model = new CheckOutModel();

      $model1 = new User();


      $interior_user = $model1::where('id', Auth::id())->first();

      $designer_name = $interior_user['name'];

      $display_reserved_design_per_designer = $model::where('designer_name', $designer_name)
                                            ->orderBy('billing_name', 'desc')
                                            ->get(); 

      return response()->json($display_reserved_design_per_designer);

  }

  public function reserved_design_per_admin() {

      $model = new CheckOutModel();


      $display_reserved_design_per_designer = $model::all();

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
            $records_per_page = ($type == 'video') ? 6 : 6;

            $files = $model::where('type', $type)
                            ->inRandomOrder()->paginate($records_per_page);
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
