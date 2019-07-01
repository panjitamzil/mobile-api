<?php

namespace App\Http\Controllers;

use App\ProblemCategories;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    public function index () {
        $problems = ProblemCategories::all();
        return response()->json(
            [
                "status" => 200,
                "data" => $problems
            ] ,
            200
        );
    }

    public function view (Request $request) {
        $problem = ProblemCategories::find($request->id);
        return response()->json(
            [
                "status" => 200,
                "data" => $problem
            ],
            200
        );
    }
}
