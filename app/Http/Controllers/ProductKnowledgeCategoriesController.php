<?php

namespace App\Http\Controllers;

use App\ProductKnowladge;
use Illuminate\Http\Request;
use App\ProductKnowladgeCategory;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProductKnowledgeCollection;
use App\Http\Resources\ProductKnowladgeCategoryJSON as Builder;

class ProductKnowledgeCategoriesController extends Controller
{
    public function index () {
        $PKcategories = ProductKnowladgeCategory::with('products')->get();
        return response()->json(
            [
                "status" => 200,
                "data" => Builder::collection($PKcategories)
            ] ,
            200
        );
    }

    public function view (Request $request) {
        $PKcategory = ProductKnowladgeCategory::with('products')->find($request->id);
        return response()->json(
            [
                "status" => 200,
                "data" => $PKcategory
            ],
            200
        );
    }

    public function create (Request $request) {
        $validator = Validator::make($request->json()->all(), [
          'name' => ['required', 'string', 'max:255', 'unique:product_knowladge_categories']
        ]);

        if($validator->fails()){
          $messages = [];
          foreach ($validator->errors()->getMessages() as $item) {
            array_push($messages, $item[0]);
          }

          return response()->json(
            [
                "status" => 503,
                "message" => $messages
            ],
            503
          );
        }

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

    public function view_products ($category_id) {
      $PK = ProductKnowladge::where('product_knowlagde_category_id', $category_id)->with('carModel')->get();

      return response()->json(
        [
            "status" => 200,
            "data" => ProductKnowledgeCollection::collection($PK)
        ],
        200
      );
    }
}
