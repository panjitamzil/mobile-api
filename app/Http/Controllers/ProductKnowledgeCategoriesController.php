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

    public function create (Request $request) {
        $PKcategory = new ProductKnowladgeCategory;
        $PKcategory->name = $request->name;
        $PKcategory->save();

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

        $PKcategory = ProductKnowladgeCategory::find($id);
        $PKcategory->name = $name;
        $PKcategory->save();

        return response()->json(
            [
                "status" => 200,
                "data" => "Data successfully updated"
            ],
            200
        );
    }

    public function delete ($id) {
        $PKcategory = ProductKnowladgeCategory::find($id);
        $PKcategory->delete();

        return response()->json(
            [
                "status" => 204,
                "data" => "Data successfully deleted"
            ],
            204
        );
    }
}
