<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\ArchitectUploadModel;
use App\FurnituresAccessoriesModel;

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




}