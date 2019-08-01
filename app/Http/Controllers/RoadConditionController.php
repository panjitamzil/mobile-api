<?php

namespace App\Http\Controllers;

use App\RoadCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoadConditionController extends Controller
{
    public function index () {
        $roadCondition = RoadCondition::all();
        return response()->json(
            [
                "status" => 200,
                "data" => $roadCondition
            ] ,
            200
        );
    }

    public function view (Request $request) {
        $roadCondition = RoadCondition::find($request->id);
        return response()->json(
            [
                "status" => 200,
                "data" => $roadCondition
            ],
            200
        );
    }

    public function create (Request $request) {
        $validator = Validator::make($request->json()->all(), [
          'name' => ['required', 'string', 'max:255', 'unique:road_condition']
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

        $roadCondition = new RoadCondition;
        $roadCondition->name = $request->name;
        $roadCondition->save();

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

        $roadCondition = RoadCondition::find($id);
        $roadCondition->name = $name;
        $roadCondition->save();

        return response()->json(
            [
                "status" => 200,
                "data" => "Data successfully updated"
            ],
            200
        );
    }

    public function delete ($id) {
        $roadCondition = RoadCondition::find($id);
        $roadCondition->delete();

        return response()->json(
            [
                "status" => 204,
                "data" => "Data successfully deleted"
            ],
            204
        );
    }
}
