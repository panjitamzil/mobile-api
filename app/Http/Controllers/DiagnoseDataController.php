<?php

namespace App\Http\Controllers;

use App\DiagnoseData;
use Illuminate\Http\Request;

class DiagnoseDataController extends Controller
{
    public function index () {
        $diagnose = DiagnoseData::all();
        return response()->json(
            [
                "status" => 200,
                "data" => $diagnose
            ] ,
            200
        );
    }

    public function view (Request $request) {
        $diagnose = DiagnoseData::find($request->id);
        return response()->json(
            [
                "status" => 200,
                "data" => $diagnose
            ],
            200
        );
    }

    public function create (Request $request) {
        $data = $request->all();
        $diagnose = DiagnoseData::create($data);

        return response()->json(
            [
                "status" => 200,
                "data" => "Data successfully created"
            ],
            200
        );
    }

    public function update (Request $request, $id) {
        $diagnose = DiagnoseData::find($id);
        $diagnose->update($request->all());
        $diagnose->save();

        return response()->json(
            [
                "status" => 200,
                "data" => "Data successfully updated"
            ],
            200
        );
    }

    public function delete ($id) {
        $diagnose = DiagnoseData::find($id);
        $diagnose->delete();

        return response()->json(
            [
                "status" => 204,
                "data" => "Data successfully deleted"
            ],
            204
        );
    }
}
