<?php

namespace App\Http\Controllers;

use App\CarModel;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index () {
        $cars = CarModel::all();
        return response()->json(
            [
                "status" => 200,
                "data" => $cars
            ] ,
            200
        );
    }

    public function view (Request $request) {
        $car = CarModel::find($request->id);
        return response()->json(
            [
                "status" => 200,
                "data" => $car
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
                "status" => 204,
                "data" => "Data successfully deleted"
            ],
            204
        );
    }
}
