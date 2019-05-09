<?php

namespace App\Http\Controllers;

include ("../vendor/autoload.php");

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App;
use App\ArchitectUploadModel;
use App\CheckOutModel;
use App\User;


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

            $test = md5($designCode);
        /*FOR DESIGN CODE END*/


         return response()->json($test);
    }
}
