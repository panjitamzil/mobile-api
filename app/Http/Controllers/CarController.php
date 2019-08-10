<?php

namespace App\Http\Controllers;

use App\CarModel; 
use Illuminate\Http\Request;
use App\Http\Resources\CarModel as CarModelResource;

class CarController extends Controller
{
    public function index () {
        $cars = CarModel::with('technical_knowladge')->get();
        return response()->json(
            [
                "status" => 200,
                "data" => CarModelResource::collection($cars)
            ] ,
            200
        );
    }

    public function view (Request $request) {
        $car = CarModel::find($request->id);
        return response()->json(
            [
                "status" => 200,
                "data" => new CarModelResource($car)
            ],
            200
        );
    }

    public function create (Request $request) {
        $car = new CarModel;
        $car->name = $request->name;
        $car->save();

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

        $car = CarModel::find($id);
        $car->name = $name;
        $car->save();

        return response()->json(
            [
                "status" => 200,
                "data" => "Data successfully updated"
            ],
            200
        );
    }

    public function delete ($id) {
        $car = CarModel::find($id);
        $car->delete();

        return response()->json(
            [
                "status" => 200,
                "data" => "Data successfully deleted"
            ],
            200
        );
    }
}
