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

class ArchitectPostController extends Controller
{
    private $image_ext = ['jpg', 'jpeg', 'png'];





    public function upload_portfolio(Request $request) {


        // $max_size = (int)ini_get('upload_max_filesize') * 1024;
        // $all_ext = implode(',', $this->allExtensions());

        //  $this->validate($request, [
        //     // 'name' => 'required|unique:architect_upload_models',
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

        $file->storeAs('/public/' . $portfolio . '/' . $main_pic . '/' . $this->getUserDir() . '/' . $type . '/', $designCode . '.' . $ext);    
        $file1->storeAs('/public/' . $portfolio . '/' . $thumbnail1 . '/' . $this->getUserDir() . '/' . $type . '/', $designCode . '.' . $ext);  
        $file2->storeAs('/public/' . $portfolio . '/' . $thumbnail2 . '/' . $this->getUserDir() . '/' . $type . '/', $designCode . '.' . $ext);  
        $file3->storeAs('/public/' . $portfolio . '/' . $thumbnail3 . '/' . $this->getUserDir() . '/' . $type . '/', $designCode . '.' . $ext);  
        $file4->storeAs('/public/' . $portfolio . '/' . $thumbnail4 . '/' . $this->getUserDir() . '/' . $type . '/', $designCode . '.' . $ext);  
                 
           $model::create([
                    'name' => $request['name'],
                    'description' => $request['description'],
                    'type' => $request['design_type'],
                    'floor_plan_code' => $designCode,
                    'price' => $request['price'],
                    'beds' => $request['beds'],
                    'baths' => $request['baths'],
                    'lot_area_width' => $request['lotarea_width'],
                    'lot_area_length' => $request['lotarea_length'],
                    'floor_area_width' => $request['floorarea_width'],
                    'floor_area_length' => $request['floorarea_length'],
                    'floor_area_height' => $request['floorarea_height'],
                    'ground_floor' => $request['ground_floor'],
                    'second_floor' => $request['second_floor'],
                    'third_floor' => $request['third_floor'],
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

            $version = new Version2x("http://localhost:3001");
            $client = new Client($version);

            $client->initialize();


            $model = new CheckOutModel();
            $model1 = new ArchitectUploadModel();
            $model2 = new User();

            $design = $model1::where('id', $id)->first();

            $design_code = $design['floor_plan_code'];
            //get designer ID
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

                    $noti_display_reserved_design_info = $model::where('noti_architect', 1)->count();

                    $client->emit("noti_reservation_architect", [$noti_display_reserved_design_info]);

                    $client->close();
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
         $model->price = $request->get('val_3');
         $model->type = $request->get('val_4');
         $model->beds = $request->get('val_5');
         $model->baths = $request->get('val_7');
         $model->lot_area_width = $request->get('val_8');
         $model->lot_area_length = $request->get('val_9');
         $model->floor_area_width = $request->get('val_10');
         $model->floor_area_length = $request->get('val_11');
         $model->floor_area_height = $request->get('val_12');
         $model->ground_floor = $request->get('val_13');
         $model->second_floor = $request->get('val_14');
         $model->third_floor = $request->get('val_15');
         $model->lower_level_bedrooms = $request->get('val_16');
         $model->walk_in_closet = $request->get('val_17');
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
            Storage::disk('local')->exists('/public/' . $portfolio . '/' . $main_pic . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->floor_plan_code . '.' . $file->extension) &&

            Storage::disk('local')->exists('/public/' . $portfolio . '/' . $thumbnail1 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->floor_plan_code . '.' . $file->extension) &&
            Storage::disk('local')->exists('/public/' . $portfolio . '/' . $thumbnail2 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->floor_plan_code . '.' . $file->extension) &&
            Storage::disk('local')->exists('/public/' . $portfolio . '/' . $thumbnail3 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->floor_plan_code . '.' . $file->extension) &&
            Storage::disk('local')->exists('/public/' . $portfolio . '/' . $thumbnail4 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->floor_plan_code . '.' . $file->extension)
             ) {
            if (
                Storage::disk('local')->delete('/public/' . $portfolio . '/' . $main_pic . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->floor_plan_code . '.' . $file->extension) &&
                Storage::disk('local')->delete('/public/' . $portfolio . '/' . $thumbnail1 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->floor_plan_code . '.' . $file->extension) &&
                Storage::disk('local')->delete('/public/' . $portfolio . '/' . $thumbnail2 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->floor_plan_code . '.' . $file->extension) &&
                Storage::disk('local')->delete('/public/' . $portfolio . '/' . $thumbnail3 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->floor_plan_code . '.' . $file->extension) &&
                Storage::disk('local')->delete('/public/' . $portfolio . '/' . $thumbnail4 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->floor_plan_code . '.' . $file->extension)
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
