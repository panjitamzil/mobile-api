<?php

namespace App\Http\Controllers;

use App\ProblemComponent;
use Illuminate\Http\Request;

class ProblemComponentController extends Controller
{
    public function index () {
        $pc = ProblemComponent::all();
        return response()->json(
            [
                "status" => 200,
                "data" => $pc
            ] ,
            200
        );
    }

    public function view (Request $request) {
        $pc = ProblemComponent::find($request->id);
        return response()->json(
            [
                "status" => 200,
                "data" => $pc
            ],
            200
        );
    }

    public function create (Request $request) {
        $pc = new ProblemComponent;
        $pc->name = $request->name;
        $pc->save();

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

        $pc = ProblemComponent::find($id);
        $pc->name = $name;
        $pc->save();

        return response()->json(
            [
                "status" => 200,
                "data" => "Data successfully updated"
            ],
            200
        );
    }

    public function delete ($id) {
        $pc = ProblemComponent::find($id);
        $pc->delete();

        return response()->json(
            [
                "status" => 204,
                "data" => "Data successfully deleted"
            ],
            204
        );
    }
}
