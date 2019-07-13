<?php

namespace App\Http\Controllers;

use App\TechnologyKnowledgeCategory;
use Illuminate\Http\Request;

class TechnologyKnowledgeCategoriesController extends Controller
{
    public function index () {
        $TechnologyCategories = TechnologyKnowledgeCategory::all();
        return response()->json(
            [
                "status" => 200,
                "data" => $TechnologyCategories
            ] ,
            200
        );
    }

    public function view (Request $request) {
        $TechnologyCategory = TechnologyKnowledgeCategory::find($request->id);
        return response()->json(
            [
                "status" => 200,
                "data" => $TechnologyCategory
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
