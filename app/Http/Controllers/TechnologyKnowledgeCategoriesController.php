<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TechnologyKnowledgeCategory;
use App\Http\Resources\TechnologyKnowledgeCategoryJSON as Builder;

class TechnologyKnowledgeCategoriesController extends Controller
{
    public function index () {
        $TechnologyCategories = TechnologyKnowledgeCategory::with('technologies')->get();
        return response()->json(
            [
                "status" => 200,
                "data" => Builder::collection($TechnologyCategories)
            ] ,
            200
        );
    }

    public function view (Request $request) {
        $TechnologyCategory = TechnologyKnowledgeCategory::find($request->id);
        return response()->json(
            [
                "status" => 200,
                "data" => new Builder($TechnologyCategory)
            ],
            200
        );
    }

    public function create (Request $request) {
        $TechnologyCategory = new TechnologyKnowledgeCategory;
        $TechnologyCategory->name = $request->name;
        $TechnologyCategory->slug = $request->slug;
        $TechnologyCategory->save();

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
        $slug = $request->slug;

        $TechnologyCategory = TechnologyKnowledgeCategory::find($id);
        $TechnologyCategory->name = $name;
        $TechnologyCategory->slug = $slug;
        $TechnologyCategory->save();

        return response()->json(
            [
                "status" => 200,
                "data" => "Data successfully updated"
            ],
            200
        );
    }

    public function delete ($id) {
        $TechnologyCategory = TechnologyKnowledgeCategory::find($id);
        $TechnologyCategory->delete();

        return response()->json(
            [
                "status" => 204,
                "data" => "Data successfully deleted"
            ],
            204
        );
    }
}
