<?php

namespace App\Http\Controllers;

use App\ProductKnowladge;
use Illuminate\Http\Request;
use App\Http\Resources\ProductKnowledgeCollection;
use App\Http\Resources\ProductKnowledge as ProductKnowledgeJSON;


class ProductKnowladgeController extends Controller
{
    public function index () {
        $PK = ProductKnowladge::with('carModel')->get();
        return response()->json(
            [
                "status" => 200,
                "data" => ProductKnowledgeCollection::collection($PK)
            ] ,
            200
        );
    }

    public function view (Request $request) {
        $PK = ProductKnowladge::find($request->id);
        return response()->json(
            [
                "status" => 200,
                "data" => new ProductKnowledgeJSON($PK)
            ],
            200
        );
    }

    public function create (Request $request) {
        $pk = new ProductKnowladge;
        $pk->car_model_id = $request->car_model_id;
        $pk->product_knowlagde_category_id = $request->product_knowlagde_category_id;
        $pk->filename = $request->file('filename');
        $pk->save();

        //Move Uploaded File
        $destinationPath = 'uploads';
        $pk->filename->move($destinationPath,$pk->filename->getClientOriginalName());

        return response()->json(
            [
                "status" => 200,
                "data" => "Data successfully created"
            ],
            200
        );
    }

    public function update (Request $request, $id) {
        $car_model_id = $request->car_model_id;
        $product_knowlagde_category_id = $request->product_knowlagde_category_id;
        $filename = $request->file('filename');

        $pk = ProductKnowladge::find($id);
        $pk->car_model_id = $car_model_id;
        $pk->product_knowlagde_category_id = $product_knowlagde_category_id;
        $pk->filename = $filename;
        $pk->save();

        //Move Uploaded File
        $destinationPath = 'uploads';
        $pk->filename->move($destinationPath,$pk->filename->getClientOriginalName());

        return response()->json(
            [
                "status" => 200,
                "data" => "Data successfully updated"
            ],
            200
        );
    }

    public function delete ($id) {
        $pk = ProductKnowladge::find($id);
        $pk->delete();

        return response()->json(
            [
                "status" => 204,
                "data" => "Data successfully deleted"
            ],
            204
        );
    }
}
