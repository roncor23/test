<?php

namespace App\Http\Controllers;

// include ("../vendor/autoload.php");

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App;
use App\ArchitectUploadModel;
use App\CheckOutModel;
use App\User;
use App\ArchitectProfileModel;
use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2x;
use Illuminate\Support\Facades\Hash;
use Image;

class ConstructorPostController extends Controller
{
        public function change_constructor_password(Request $request) {

        $model = new User();

        $user = $model::where('id', Auth::id())->first();

        $verify = password_verify($request['c_password'], $user['password']);


        if($request['n_password'] == $request['cn_password']) {

            if($verify) {

                    $hash = Hash::make($request['n_password']);

                    $update_password = $model::where('id', Auth::id())
                            ->update(['password' => $hash]);

                    $msg = "Password changed successfully!";   
                         
                    return response()->json($msg);

             
            } else {

                 $msg = "Password doesnt recognized!";   
                         
                 return response()->json($msg);
            }


        }else {

                $msg = "Incorrect confirm password!";   
                     
                return response()->json($msg);
        }




    }

        public function change_constructor_email(Request $request) {

        $model = new User();

        $current_email = $request['c_email'];

        $user = $model::where('id', Auth::id())->first();

        if($user['email'] == $current_email) {

            $verify = password_verify($request['password'], $user['password']);

            $new_email = $request['n_email'];

            if($verify) {

                $update_email = $model::where('id', Auth::id())
                        ->update(['email' => $new_email]);

                $msg = "Email changed successfully!";   
                     
                return response()->json($msg);

            } else {

                $msg = "Incorrect password!";   
                     
                return response()->json($msg);
            }

        }else {
             $msg = "Email doesn't recognized!";   
                     
             return response()->json($msg);
        }


    }

        public function save_constructor_profile(Request $request) {

        $model = new ArchitectProfileModel();

        $profile = $request->file('profile');
        $ext = "jpg";

        $name = Auth::user()->name;

        $type = "Profile";

        $profile->storeAs('/public/'. $type . '/', $name . '.' . $ext);    

                    $model::create([
                    'full_name' => $request['fullname'],
                    'username' => Auth::user()->name,
                    'address' => $request['address1'],
                    'address2' => $request['address2'],
                    'city_town' => $request['city'],
                    'postcode' => $request['postcode'],
                    'phone' => $request['phone'],
                    'state_country_province' => $request['province'],
                    'country' => $request['country'],
                    'birthday' => $request['birthday'],
                    'admin_id' => Auth::id()
                ]);

        $msg = "Profile saved sucessfully!";

        return response()->json($msg);

    }

        public function update_profile(Request $request) {

         $model = App\ArchitectProfileModel::where('admin_id', Auth::id())->first();

         $model->full_name = $request->get('val_1');
         $model->address = $request->get('val_2');
         $model->address2 = $request->get('val_3');
         $model->city_town = $request->get('val_4');
         $model->postcode = $request->get('val_5');
         $model->phone = $request->get('val_6');
         $model->state_country_province = $request->get('val_7');
         $model->country = $request->get('val_8');
         $model->birthday = $request->get('val_9');
         $model->save();

         $msg = "Profile Updated sucessfully!";

         return response()->json($msg);

    }
}
