<?php


namespace App\Http\Controllers;

include ("../vendor/autoload.php");

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App;
use App\AddDesignerAccountModel;
use App\User;

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2x;

class AdminPostController extends Controller
{
    public function save_designer_account(Request $request) {

         $model = new AddDesignerAccountModel();

         $model->user_name = $request->get('val_1');
         $model->email = $request->get('val_2');
         $model->verification_code = $request->get('val_3');
         $model->role = $request->get('val_4');
         $model->admin_id = Auth::id();

         $model->save();

         $msg = "Account added sucessfully!";

         return response()->json($msg);
    }

    public function designer_set_password(Request $request) {

        $model = new AddDesignerAccountModel();
        $model1 = new user();

        $email = $request->get('val_1');
        $pass = $request->get('val_2');
        $p = bcrypt($pass);

        //Validation for empty email and password

        $select = $model::where('email', $email)->first();
        //Validation for correct email
        if(!$select) {
            $msg = "Check your email!";
            return response()->json($msg);
        }

        //Validation for verified account
        if($select['verified'] == 0) {
            $msg = "Account not verified!";
            return response()->json($msg);
        }

        $select = $model1::where('email', $email)->first();
        //Validation for having done set password
        if($select['password'] != NULL) {
            $msg = "You have already set the password!";
            return response()->json($msg);
        }
     
        $verified = $model1::where('email', $email)
                            ->update(['password' => $p]);

        $msg = "Password set successfully!";
           
        return response()->json($msg);

    }

        public function designer_verification(Request $request) {

        $model = new AddDesignerAccountModel();
        $model1 = new user();


        $email = $request->get('val_1');
        $verification_code = $request->get('val_2');

        $select = $model::where('email', $email)->first();
        //Check if designer account is verified
        if($select['verified'] == 1) {

           $msg = "Account is already verified!";

           return response()->json($msg);
        }


        $verified = $model::where('email', $email)
                            ->where('verification_code', $verification_code)
                            ->update(['verified' => 1]);
        //check if email and verification code is valid
        if(!$verified) {
           $msg = "Invalid! Check your email and verification code!";

           return response()->json($msg);
        }

        $model1->name = $select['user_name'];
        $model1->email = $select['email'];
        $model1->role = $select['role'];
        $model1->password = "";
        $model1->save();

         $msg = "Account verified sucessfully!";

         return response()->json($msg);
    }


}
