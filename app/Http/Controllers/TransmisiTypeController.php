<?php

namespace App\Http\Controllers;

use App\TransmisiType;
use Illuminate\Http\Request;

class TransmisiTypeController extends Controller
{
    public function index () {
        $transmisi = TransmisiType::all();
        return response()->json(
            [
                "status" => 200,
                "data" => $transmisi
            ] ,
            200
        );
    }

    public function view (Request $request) {
        $transmisi = TransmisiType::find($request->id);
        return response()->json(
            [
                "status" => 200,
                "data" => $transmisi
            ],
            200
        );
    }

    public function create (Request $request) {
        $transmisi = new TransmisiType;
        $transmisi->name = $request->name;
        $transmisi->save();

        return response()->json(
            [
                "status" => 200,
                "data" => "Data successfully created"
            ],
            200
        );
    }

    public function update (Request $request, $id) {
        $name = $request->name;

        $transmisi = TransmisiType::find($id);
        $transmisi->name = $name;
        $transmisi->save();

        return response()->json(
            [
                "status" => 200,
                "data" => "Data successfully updated"
            ],
            200
        );
    }

    public function delete ($id) {
        $transmisi = TransmisiType::find($id);
        $transmisi->delete();

        return response()->json(
            [
                "status" => 204,
                "data" => "Data successfully deleted"
            ],
            204
        );
    }
}
