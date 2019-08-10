<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TechnicalProblemCategory;
use App\Http\Resources\TechnicalProblemCategoryJSON as Builder;

class TechnicalProblemCategoriesController extends Controller
{
    public function index () {
        $TechnicalCategories = TechnicalProblemCategory::all();
        return response()->json(
            [
                "status" => 200,
                "data" => Builder::collection($TechnicalCategories)
            ] ,
            200
        );
    }

    public function view (Request $request) {
        $TechnicalCategory = TechnicalProblemCategory::find($request->id);
        return response()->json(
            [
                "status" => 200,
                "data" => new Builder($TechnicalCategory)
            ],
            200
        );
    }

    public function create (Request $request) {
        $TechnicalCategory = new TechnicalProblemCategory;
        $TechnicalCategory->name = $request->name;
        $TechnicalCategory->save();

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

        $TechnicalCategory = TechnicalProblemCategory::find($id);
        $TechnicalCategory->name = $name;
        $TechnicalCategory->save();

        return response()->json(
            [
                "status" => 200,
                "data" => "Data successfully updated"
            ],
            200
        );
    }

    public function delete ($id) {
        $TechnicalCategory = TechnicalProblemCategory::find($id);
        $TechnicalCategory->delete();

        return response()->json(
            [
                "status" => 204,
                "data" => "Data successfully deleted"
            ],
            204
        );
    }
}
