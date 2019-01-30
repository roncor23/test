<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App;
use App\ArchitectUploadModel;

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

       

        $file->storeAs('/public/' . $portfolio . '/' . $main_pic . '/' . $this->getUserDir() . '/' . $type . '/', $request['name'] . '.' . $ext);    
        $file1->storeAs('/public/' . $portfolio . '/' . $thumbnail1 . '/' . $this->getUserDir() . '/' . $type . '/', $request['name'] . '.' . $ext);  
        $file2->storeAs('/public/' . $portfolio . '/' . $thumbnail2 . '/' . $this->getUserDir() . '/' . $type . '/', $request['name'] . '.' . $ext);  
        $file3->storeAs('/public/' . $portfolio . '/' . $thumbnail3 . '/' . $this->getUserDir() . '/' . $type . '/', $request['name'] . '.' . $ext);  
        $file4->storeAs('/public/' . $portfolio . '/' . $thumbnail4 . '/' . $this->getUserDir() . '/' . $type . '/', $request['name'] . '.' . $ext);  
                 
           $model::create([
                    'name' => $request['name'],
                    'description' => $request['description'],
                    'design_type' => $request['design_type'],
                    'price' => $request['price'],
                    'quantity' => $request['quantity'],
                    'type' => $type,
                    'floor_plan_code' => $request['floor_plan_code'],
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
                    'user_id' => Auth::id(),
                    'user_name' => Auth::user()->name
                ]);

        $msg = "File Uploaded sucessfully!";

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



    public function main_image_remove($id) {

         $file = ArchitectUploadModel::findOrFail($id);

        $portfolio = "portfolio";
        $main_pic  = "main_pic";

        if (
            Storage::disk('local')->exists('/public/' . $portfolio . '/' . $main_pic . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->name . '.' . $file->extension) 
             ) {
            if (
                Storage::disk('local')->delete('/public/' . $portfolio . '/' . $main_pic . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->name . '.' . $file->extension)
             ) {
                return response()->json($file->delete());
            }
        }

        return response()->json(false);

    }

        public function thumbnail1_image_remove($id) {

         $file = ArchitectUploadModel::findOrFail($id);

        $portfolio = "portfolio";
        $thumbnail1 = "thumbnail1";

        if ( 
            Storage::disk('local')->exists('/public/' . $portfolio . '/' . $thumbnail1 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->name . '.' . $file->extension)
             ) {
            if (        
                Storage::disk('local')->delete('/public/' . $portfolio . '/' . $thumbnail1 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->name . '.' . $file->extension)
             ) {
                return response()->json($file->delete());
            }
        }

        return response()->json(false);

    }

        public function thumbnail2_image_remove($id) {

         $file = ArchitectUploadModel::findOrFail($id);

        $portfolio = "portfolio";
        $thumbnail2 = "thumbnail2";

        if (
            Storage::disk('local')->exists('/public/' . $portfolio . '/' . $thumbnail2 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->name . '.' . $file->extension)
             ) {
            if (            
                Storage::disk('local')->delete('/public/' . $portfolio . '/' . $thumbnail2 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->name . '.' . $file->extension)
             ) {
                return response()->json($file->delete());
            }
        }

        return response()->json(false);

    }

        public function thumbnail3_image_remove($id) {

         $file = ArchitectUploadModel::findOrFail($id);

        $portfolio = "portfolio";
        $thumbnail3 = "thumbnail3";

        if (
            Storage::disk('local')->exists('/public/' . $portfolio . '/' . $thumbnail3 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->name . '.' . $file->extension)
             ) {
            if (
                Storage::disk('local')->delete('/public/' . $portfolio . '/' . $thumbnail3 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->name . '.' . $file->extension)
             ) {
                return response()->json($file->delete());
            }
        }

        return response()->json(false);

    }

        public function thumbnail4_image_remove($id) {

         $file = ArchitectUploadModel::findOrFail($id);

        $portfolio = "portfolio";
        $thumbnail4 = "thumbnail4";

        if (
            Storage::disk('local')->exists('/public/' . $portfolio . '/' . $thumbnail4 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->name . '.' . $file->extension)
             ) {
            if (
                Storage::disk('local')->delete('/public/' . $portfolio . '/' . $thumbnail4 . '/' . $this->getUserDir() . '/' . $file->type . '/' . $file->name . '.' . $file->extension)
             ) {
                return response()->json($file->delete());
            }
        }

        return response()->json(false);

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
