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

class ConstructorGetController extends Controller
{
      public function show_constructor_profile($id) {

      $model = new ArchitectProfileModel();

      $profile_per_architect = $model::where('admin_id', Auth::id())->first();


      $response = [
        'profile_per_architect' => $profile_per_architect
      ];

        return response()->json($response);

  }
}
