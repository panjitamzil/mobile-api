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
}
