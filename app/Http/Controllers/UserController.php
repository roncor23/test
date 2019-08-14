<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\ArchitectUploadModel;
use App\FurnituresAccessoriesModel;
use App\ArchitectProfileModel;
use App\UserQuestionModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json(
            [
                'status' => 'success',
                'users' => $users->toArray()
            ], 200);
    }
    
    public function show(Request $request, $id)
    {
        $user = User::find($id);
        return response()->json(
            [
                'status' => 'success',
                'user' => $user->toArray()
            ], 200);
    }

    public function list_of_building_designs_residential_architecture($search) {

        $designs = new ArchitectUploadModel();

        $list = $designs::where('name', $search)
                        ->where('type', 'architecturalresidential')
                        ->get();

        if(sizeof($list)==0) {

            $erro = "Search not found!";

            return response()->json($erro);
        }

        return response()->json($list);

    }



    public function list_of_building_designs_institutional_architecture($search) {

        $designs = new ArchitectUploadModel();

        $list = $designs::where('name', $search)
                        ->where('type', 'architecturalinstitutional')
                        ->get();

        if(sizeof($list)==0) {

            $erro = "Search not found!";

            return response()->json($erro);
        }

        return response()->json($list);

    }


    public function list_of_building_designs_hospitality_architecture($search) {

        $designs = new ArchitectUploadModel();

        $list = $designs::where('name', $search)
                        ->where('type', 'architecturalhospitality')
                        ->get();

        if(sizeof($list)==0) {

            $erro = "Search not found!";

            return response()->json($erro);
        }

        return response()->json($list);

    }

    public function list_of_building_designs_commercial_architecture($search) {

        $designs = new ArchitectUploadModel();

        $list = $designs::where('name', $search)
                        ->where('type', 'architecturalcommercial')
                        ->get();

        if(sizeof($list)==0) {

            $erro = "Search not found!";

            return response()->json($erro);
        }

        return response()->json($list);

    }

    public function list_of_building_designs_residential_interior($search) {

        $designs = new ArchitectUploadModel();

        $list = $designs::where('name', $search)
                        ->where('type', 'interiorresidential')
                        ->get();

        if(sizeof($list)==0) {

            $erro = "Search not found!";

            return response()->json($erro);
        }

        return response()->json($list);

    }

    public function list_of_building_designs_institutional_interior($search) {

        $designs = new ArchitectUploadModel();

        $list = $designs::where('name', $search)
                        ->where('type', 'interiorinstitutional')
                        ->get();

        if(sizeof($list)==0) {

            $erro = "Search not found!";

            return response()->json($erro);
        }

        return response()->json($list);

    }

    public function list_of_building_designs_hospitality_interior($search) {

        $designs = new ArchitectUploadModel();

        $list = $designs::where('name', $search)
                        ->where('type', 'interiorhospitality')
                        ->get();

        if(sizeof($list)==0) {

            $erro = "Search not found!";

            return response()->json($erro);
        }

        return response()->json($list);

    }

    public function list_of_building_designs_commercial_interior($search) {

        $designs = new ArchitectUploadModel();

        $list = $designs::where('name', $search)
                        ->where('type', 'interiorcommercial')
                        ->get();

        if(sizeof($list)==0) {

            $erro = "Search not found!";

            return response()->json($erro);
        }

        return response()->json($list);

    }

        public function list_of_furnitures_accessories_designs_p($search) {

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

        $list = $designs::where('name', $search)
                        ->get();

        if(sizeof($list)==0) {

            $erro = "Search not found!";

            return response()->json($erro);
        }

        return response()->json($list);

    }

    public function save_user_profile(Request $request) {

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


      public function show_user_profile($id) {

          $model = new ArchitectProfileModel();

          $profile_per_user = $model::where('admin_id', Auth::id())->first();


          $response = [
            'profile_per_user' => $profile_per_user
          ];

            return response()->json($response);

      }


        public function question(Request $request) {

        $model = new UserQuestionModel();

                $model::create([
                    'first_name' => $request['firstName'],
                    'last_name' => $request['lastName'],
                    'email' => $request['email'],
                    'select' => $request['select'],
                    'question' => $request['question'],

                ]);

        $msg = "Question submitted successfully, we will email you!";

        return response()->json($msg);



    }



          public function change_individuals_email(Request $request) {

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


    public function change_individuals_password(Request $request) {

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


    public function get_individuals_username() {

    $model = new User();

    $get_user_name = $model::where('id', Auth::id())->first();

    return response()->json($get_user_name);

   }
}