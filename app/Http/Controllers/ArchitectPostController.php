<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App;
use App\ArchitectUploadModel;
use App\CheckOutModel;
use App\User;

class ArchitectPostController extends Controller
{
    private $image_ext = ['jpg', 'jpeg', 'png', 'gif'];





    public function upload_portfolio(Request $request) {


        $max_size = (int)ini_get('upload_max_filesize') * 1000;
        $all_ext = implode(',', $this->allExtensions());

        //  $this->validate($request, [
        //     'name' => 'required|unique:files',
        //     'file' => 'required|file|mimes:' . $all_ext . '|max:' . $max_size
        // ]);

        $model = new ArchitectUploadModel();

        $portfolio = "portfolio";
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

        $type = $request['design_type'];

        $filename = $request['floor_plan_code'];

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

        $file->storeAs('/public/' . $portfolio . '/' . $main_pic . '/' . $this->getUserDir() . '/' . $type . '/', $designNumber . '.' . $ext);    
        $file1->storeAs('/public/' . $portfolio . '/' . $thumbnail1 . '/' . $this->getUserDir() . '/' . $type . '/', $designNumber . '.' . $ext);  
        $file2->storeAs('/public/' . $portfolio . '/' . $thumbnail2 . '/' . $this->getUserDir() . '/' . $type . '/', $designNumber . '.' . $ext);  
        $file3->storeAs('/public/' . $portfolio . '/' . $thumbnail3 . '/' . $this->getUserDir() . '/' . $type . '/', $designNumber . '.' . $ext);  
        $file4->storeAs('/public/' . $portfolio . '/' . $thumbnail4 . '/' . $this->getUserDir() . '/' . $type . '/', $designNumber . '.' . $ext);  
                 
           $model::create([
                    'name' => $request['name'],
                    'description' => $request['description'],
                    'design_type' => $request['design_type'],
                    'price' => $request['price'],
                    'quantity' => $request['quantity'],
                    'type' => $type,
                    'floor_plan_code' => $designCode,
                    'floor_area' => $request['floor_area'],
                    'floors' => $request['floors'],
                    'garage' => $request['garage'],
                    'beds' => $request['beds'],
                    'baths' => $request['baths'],
                    'lot_size' => $request['lot_size'],
                    'depth' => $request['depth'],
                    'width' => $request['width'],
                    'height' => $request['height'],
                    'main_floor_area' => $request['main_floor_area'],
                    'lower_floor_area' => $request['lower_floor_area'],
                    'garage_area' => $request['garage_area'],
                    'deck_area' => $request['deck_area'],

                    'lower_ceiling' => $request['lower_ceiling'],
                    'garage_ceiling' => $request['garage_ceiling'],
                    'main_ceiling' => $request['main_ceiling'],

                    'roof' => $request['roof'],
                    'master_bedroom' => $request['master_bedroom'],
                    'bedrooms' => $request['bedrooms'],
                    'lower_level_bedrooms' => $request['lower_level_bedrooms'],
                    'walk_in_closet' => $request['walk_in_closet'],
                    'extension' => $ext,
                    'user_name' => Auth::user()->name,
                    'user_id' => Auth::id()
                ]);

        $msg = "File Uploaded sucessfully!";

        return response()->json($msg);

    }

    public function reserve_design(Request $request, $id) {

            $model = new CheckOutModel();
            $model1 = new ArchitectUploadModel();
            $model2 = new User();

            $design = $model1::where('id', $id)->first();

            $design_code = $design['floor_plan_code'];

            $user_id = $design['user_id'];

            $user = $model2::where('id', $user_id)->first();

            $d_name = $user['name'];

            $user_role = $user['role'];

/*FOR REFERENCE NUMBER START*/
            $dateString = date('Ymd');
            $branchNumber = 100;
            $receiptNumber = 1;


            $latestReservation = $model::latest('created_at')->first();

            $lastReceiptNumber = $latestReservation['id']; 


            if($receiptNumber < 9999) {

              $receiptNumber = $lastReceiptNumber + 1;

            }else{
             $receiptNumber = 1;
            } 

            $referenceNumber = $dateString . '-' . $branchNumber . '-' . $receiptNumber;
/*FOR REFERENCE NUMBER END*/

            if($user_role == 2 ) {
                    
                    $model->billing_name = $request->get('val_1');
                    $model->billing_address_country = $request->get('val_2');
                    $model->billing_address_country_code = $request->get('val_3');
                    $model->billing_address_zip = $request->get('val_4');
                    $model->billing_address_line1 = $request->get('val_5');
                    $model->user_id = Auth::id();
                    $model->design_code = $design_code;
                    $model->designer_name = $d_name;
                    $model->noti_user = 1;
                    $model->noti_architect = 1;
                    $model->noti_admin = 1;
                    $model->reference_number = $referenceNumber;
                    $model->save();
            }else {
                    $model->billing_name = $request->get('val_1');
                    $model->billing_address_country = $request->get('val_2');
                    $model->billing_address_country_code = $request->get('val_3');
                    $model->billing_address_zip = $request->get('val_4');
                    $model->billing_address_line1 = $request->get('val_5');
                    $model->user_id = Auth::id();
                    $model->design_code = $design_code;
                    $model->designer_name = $d_name;
                    $model->noti_user = 1;
                    $model->noti_admin = 1;
                    $model->noti_interior = 1;
                    $model->reference_number = $referenceNumber;
                    $model->save();
            } 

        $msg = "File Uploaded sucessfully!";

        return response()->json($latestReservation);


    }

    public function update_portfolio(Request $request, $id) {
       

         $model = App\ArchitectUploadModel::findOrFail($id);

         $model->name = $request->get('val_1');
         $model->description = $request->get('val_2');
         $model->type = $request->get('val_3');
         $model->garage = $request->get('val_4');
         $model->floors = $request->get('val_5');
         $model->beds = $request->get('val_7');
         $model->baths = $request->get('val_8');
         $model->lot_size = $request->get('val_9');
         $model->price = $request->get('val_10');
         $model->depth = $request->get('val_11');
         $model->width = $request->get('val_12');
         $model->height = $request->get('val_13');
         $model->main_floor_area = $request->get('val_14');
         $model->lower_floor_area = $request->get('val_15');
         $model->garage_area = $request->get('val_16');
         $model->deck_area = $request->get('val_17');
         $model->lower_ceiling = $request->get('val_18');
         $model->garage_ceiling = $request->get('val_19');
         $model->main_ceiling = $request->get('val_20');
         $model->roof = $request->get('val_21');
         $model->master_bedroom = $request->get('val_22');
         $model->bedrooms = $request->get('val_23');
         $model->lower_level_bedrooms = $request->get('val_24');
         $model->walk_in_closet = $request->get('val_25');



         $model->save();

         $msg = "File Updated sucessfully!";

         return response()->json($msg);

    }


    public function update_main_image(Request $request) {

        $max_size = (int)ini_get('upload_max_filesize') * 1000;
        $all_ext = implode(',', $this->allExtensions());

        //  $this->validate($request, [
        //     'name' => 'required|unique:files',
        //     'file' => 'required|file|mimes:' . $all_ext . '|max:' . $max_size
        // ]);

        $model = new ArchitectUploadModel();

        $portfolio = "portfolio";
        $main_pic  = "main_pic";

        $file = $request->file('file');
        // $file1 = $request->file('file1');
        // $file2 = $request->file('file2');
        // $file3 = $request->file('file3');
        // $file4 = $request->file('file4');

        $ext = $file->getClientOriginalExtension();

        $type = "houses";

         $file->storeAs('/public/' . $portfolio . '/' . $main_pic . '/' . $this->getUserDir() . '/' . $type . '/', $request['name'] . '.' . $ext); 

         $msg = "File Uploaded sucessfully!";

         return response()->json($msg);   
    }



    public function delete_portfolio($id) {

        $file = ArchitectUploadModel::findOrFail($id);

        $portfolio = "portfolio";
        $main_pic  = "main_pic";
        $thumbnail1 = "thumbnail1";
        $thumbnail2 = "thumbnail2";
        $thumbnail3 = "thumbnail3";
        $thumbnail4 = "thumbnail4";

        if (
            Storage::disk('local')->exists('/public/' . $portfolio . '/' . $main_pic . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->name . '.' . $file->extension) &&

            Storage::disk('local')->exists('/public/' . $portfolio . '/' . $thumbnail1 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->name . '.' . $file->extension) &&
            Storage::disk('local')->exists('/public/' . $portfolio . '/' . $thumbnail2 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->name . '.' . $file->extension) &&
            Storage::disk('local')->exists('/public/' . $portfolio . '/' . $thumbnail3 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->name . '.' . $file->extension) &&
            Storage::disk('local')->exists('/public/' . $portfolio . '/' . $thumbnail4 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->name . '.' . $file->extension)
             ) {
            if (
                Storage::disk('local')->delete('/public/' . $portfolio . '/' . $main_pic . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->name . '.' . $file->extension) &&
                Storage::disk('local')->delete('/public/' . $portfolio . '/' . $thumbnail1 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->name . '.' . $file->extension) &&
                Storage::disk('local')->delete('/public/' . $portfolio . '/' . $thumbnail2 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->name . '.' . $file->extension) &&
                Storage::disk('local')->delete('/public/' . $portfolio . '/' . $thumbnail3 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->name . '.' . $file->extension) &&
                Storage::disk('local')->delete('/public/' . $portfolio . '/' . $thumbnail4 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->name . '.' . $file->extension)
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
