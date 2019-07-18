<?php


namespace App\Http\Controllers;

include ("../vendor/autoload.php");

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App;
use App\AddDesignerAccountModel;
use App\FurnituresAccessoriesModel;
use App\User;

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2x;

class AdminPostController extends Controller
{
    public function save_designer_account(Request $request) {

         $model = new AddDesignerAccountModel();  

            $model::create([
            'user_name' => $request['username'],
            'email' => $request['email'],
            'verification_code' => $request['verification_code'],
            'role' => $request['role'],
            'admin_id' => Auth::id()
        ]);

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

    public function upload_furniture_accessories(Request $request) {

        $model = new FurnituresAccessoriesModel();


        $furnitureAccessories = "furnitureAccessories";
        $main_pic  = "main_pic";
        $thumbnail1 = "thumbnail1";
        $thumbnail2 = "thumbnail2";
        $thumbnail3 = "thumbnail3";
        $thumbnail4 = "thumbnail4";

        $file = $request->file('file');
        $file1 = $request->file('file1');
        $file2 = $request->file('file2');
        $file3 = $request->file('file3');
        $file4 = $request->file('file4');

        $ext = $file->getClientOriginalExtension();

        $type = $request['type'];

        /*FOR DESIGN CODE START*/
            $random_number = mt_rand(10,1000);
            $designNumber = 1;


            $latestReservation = $model::latest('created_at')->first();

            $lastDesignNumber = $latestReservation['id']; 


            if($designNumber < 9999) {

              $designNumber = $lastDesignNumber + 1;

            }else{
             $designNumber = 1;
            } 

            $designCode = $random_number .  '-' . $designNumber;
        /*FOR DESIGN CODE END*/

        $file->storeAs('/public/' . $furnitureAccessories . '/' . $main_pic . '/' . $this->getUserDir() . '/' . $type . '/', $designCode . '.' . $ext);    
        $file1->storeAs('/public/' . $furnitureAccessories . '/' . $thumbnail1 . '/' . $this->getUserDir() . '/' . $type . '/', $designCode . '.' . $ext);  
        $file2->storeAs('/public/' . $furnitureAccessories . '/' . $thumbnail2 . '/' . $this->getUserDir() . '/' . $type . '/', $designCode . '.' . $ext);  
        $file3->storeAs('/public/' . $furnitureAccessories . '/' . $thumbnail3 . '/' . $this->getUserDir() . '/' . $type . '/', $designCode . '.' . $ext);  
        $file4->storeAs('/public/' . $furnitureAccessories . '/' . $thumbnail4 . '/' . $this->getUserDir() . '/' . $type . '/', $designCode . '.' . $ext);  

           $model::create([
                    'name' => $request['name'],
                    'description' => $request['description'],
                    'floor_plan_code' => $designCode,
                    'type' => $request['type'],
                    'price' => $request['price'],
                    'extension' => $ext,
                    'user_id' => Auth::id(),
                    'user_name' => Auth::user()->name,

                ]);

        $msg = "Furniture & Accessories upload successfully!";

        return response()->json($msg);
    }

        public function update_product(Request $request, $id) {
       
        $model = new FurnituresAccessoriesModel();       

        $model = App\FurnituresAccessoriesModel::findOrFail($id);

        $model->name = $request->get('val_1');
        $model->description = $request->get('val_2');
        $model->price = $request->get('val_3');
        $model->type = $request->get('val_4');
        $model->save();

        $msg = "Product Updated sucessfully!";

        return response()->json($msg);
    }

        public function delete_product($id) {

        $file = FurnituresAccessoriesModel::findOrFail($id);

        $furnitureAccessories = "furnitureAccessories";
        $main_pic  = "main_pic";
        $thumbnail1 = "thumbnail1";
        $thumbnail2 = "thumbnail2";
        $thumbnail3 = "thumbnail3";
        $thumbnail4 = "thumbnail4";

        if (
            Storage::disk('local')->exists('/public/' . $furnitureAccessories . '/' . $main_pic . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->floor_plan_code . '.' . $file->extension) &&

            Storage::disk('local')->exists('/public/' . $furnitureAccessories . '/' . $thumbnail1 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->floor_plan_code . '.' . $file->extension) &&
            Storage::disk('local')->exists('/public/' . $furnitureAccessories . '/' . $thumbnail2 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->floor_plan_code . '.' . $file->extension) &&
            Storage::disk('local')->exists('/public/' . $furnitureAccessories . '/' . $thumbnail3 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->floor_plan_code . '.' . $file->extension) &&
            Storage::disk('local')->exists('/public/' . $furnitureAccessories . '/' . $thumbnail4 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->floor_plan_code . '.' . $file->extension)
             ) {
            if (
                Storage::disk('local')->delete('/public/' . $furnitureAccessories . '/' . $main_pic . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->floor_plan_code . '.' . $file->extension) &&
                Storage::disk('local')->delete('/public/' . $furnitureAccessories . '/' . $thumbnail1 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->floor_plan_code . '.' . $file->extension) &&
                Storage::disk('local')->delete('/public/' . $furnitureAccessories . '/' . $thumbnail2 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->floor_plan_code . '.' . $file->extension) &&
                Storage::disk('local')->delete('/public/' . $furnitureAccessories . '/' . $thumbnail3 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->floor_plan_code . '.' . $file->extension) &&
                Storage::disk('local')->delete('/public/' . $furnitureAccessories . '/' . $thumbnail4 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->floor_plan_code . '.' . $file->extension)
             ) {
                return response()->json($file->delete());
            }
        }

        $file->delete();

        return response()->json(false);

    }


           /**
     * Get type by extension
     * @param  string $ext Specific extension
     * @return string      Type
     */
    private function getType($ext)
    {
        if (in_array($ext, $this->image_ext)) {
            return 'image';
        }

    }
    /**
     * Get all extensions
     * @return array Extensions of all file types
     */
    private function allExtensions()
    {
        return array_merge($this->image_ext);
    }

    /**
     * Get directory for the specific user
     * @return string Specific user directory
     */
    private function getUserDir()
    {
        return Auth::user()->name . '_' . Auth::id();
    }

}
