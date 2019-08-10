<?php

namespace App\Http\Controllers;

use URL;
use App\ProductKnowladge;
use Illuminate\Http\Request;
use App\Http\Resources\ProductKnowledgeCollection;
use App\Http\Resources\ProductKnowledge as Builder;


class ProductKnowladgeController extends Controller
{
    public function index () {
        $PK = ProductKnowladge::with(['carModel', 'product_knowlagde_category'])->get();
        return response()->json(
            [
                "status" => 200,
                "data" => Builder::collection($PK)
            ] ,
            200
        );
    }

    public function view (Request $request) {
        $PK = ProductKnowladge::find($request->id);
        return response()->json(
            [
                "status" => 200,
                "data" => new Builder($PK)
            ],
            200
        );
    }

    public function create (Request $request) {
        $pk = new ProductKnowladge;
        $pk->car_model_id = $request->car_model_id;
        $pk->product_knowlagde_category_id = $request->product_knowlagde_category_id;

        $destinationPath = 'uploads';
        $file = $request->file('filename');
        $filename = $pk->car_model_id.'-'.substr( md5( $pk->car_model_id . '-' . time() ), 0, 15) . '.'. $file->getClientOriginalExtension();
        $file->move($destinationPath, $filename);

        $pk->filename = URL::to('/'). '/uploads/' . $filename;
        $pk->save();

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

        $destinationPath = 'uploads';
        $file = $request->file('filename');
        $filename = $pk->car_model_id.'-'.substr( md5( $pk->car_model_id . '-' . time() ), 0, 15) . '.'. $file->getClientOriginalExtension();
        $file->move($destinationPath, $filename);

        $pk->filename = URL::to('/'). '/uploads/' . $filename;
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
