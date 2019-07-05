<?php

namespace App\Http\Controllers;

use App\ProductKnowladgeCategory;
use Illuminate\Http\Request;

class ProductKnowledgeCategoriesController extends Controller
{
    public function index () {
        $PKcategories = ProductKnowladgeCategory::all();
        return response()->json(
            [
                "status" => 200,
                "data" => $PKcategories
            ] ,
            200
        );
    }

    public function view (Request $request) {
        $PKcategory = ProductKnowladgeCategory::find($request->id);
        return response()->json(
            [
                "status" => 200,
                "data" => $PKcategory
            ],
            200
        );
    }
}
