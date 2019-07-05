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
}
