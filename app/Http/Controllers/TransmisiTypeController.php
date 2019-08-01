<?php

namespace App\Http\Controllers;

use App\TransmisiType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->json()->all(), [
          'name' => ['required', 'string', 'max:255', 'unique:transmisi_type']
        ]);

        if($validator->fails()){
          $messages = [];
          foreach ($validator->errors()->getMessages() as $item) {
            array_push($messages, $item[0]);
          }

          return response()->json(
            [
                "status" => 503,
                "message" => $messages
            ],
            503
          );
        }

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
