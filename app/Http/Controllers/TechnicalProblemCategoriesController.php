<?php

namespace App\Http\Controllers;

use App\TechnicalProblemCategory;
use Illuminate\Http\Request;

class TechnicalProblemCategoriesController extends Controller
{
    public function index () {
        $TechnicalCategories = TechnicalProblemCategory::all();
        return response()->json(
            [
                "status" => 200,
                "data" => $TechnicalCategories
            ] ,
            200
        );
    }

    public function view (Request $request) {
        $TechnicalCategory = TechnicalProblemCategory::find($request->id);
        return response()->json(
            [
                "status" => 200,
                "data" => $TechnicalCategory
            ],
            200
        );
    }
}
