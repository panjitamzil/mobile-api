<?php

namespace App\Http\Controllers;

use App\TechnicalKnowledge;
use Illuminate\Http\Request;
use App\Http\Resources\TechnicalKnowledgeJSON;
use App\Http\Resources\TechnicalKnowledgeCollection;

class TechnicalKnowledgeController extends Controller
{
    public function index () {
        $TK = TechnicalKnowledge::with('carModel')->with('technical_problem_category')->get();
        return response()->json(
            [
                "status" => 200,
                "data" => TechnicalKnowledgeCollection::collection($TK)
            ] ,
            200
        );
    }

    public function view (Request $request) {
        $tk = TechnicalKnowledge::find($request->id);
        return response()->json(
            [
                "status" => 200,
                "data" => new TechnicalKnowledgeJSON($tk)
            ],
            200
        );
    }

    public function create (Request $request) {
        $tk = new TechnicalKnowledge;
        $tk->car_model_id = $request->car_model_id;
        $tk->technical_problem_category_id = $request->technical_problem_category_id;
        $tk->component = $request->component;
        $tk->complaint = $request->complaint;
        $tk->analysis = $request->analysis;
        $tk->fixing = $request->fixing;
        $tk->changing_part = $request->changing_part;
        $tk->source = $request->source;
        $tk->filename = $request->file('filename');
        $tk->save();

        //Move Uploaded File
        $destinationPath = 'uploads';
        $tk->filename->move($destinationPath,$tk->filename->getClientOriginalName());

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
        $technical_problem_category_id = $request->technical_problem_category_id;
        $component = $request->component;
        $complaint = $request->complaint;
        $analysis = $request->analysis;
        $fixing = $request->fixing;
        $changing_part = $request->changing_part;
        $source = $request->source;
        $filename = $request->file('filename');

        $tk = TechnicalKnowledge::find($id);
        $tk->car_model_id = $car_model_id;
        $tk->technical_problem_category_id = $technical_problem_category_id;
        $tk->component = $component;
        $tk->complaint = $complaint;
        $tk->analysis = $analysis;
        $tk->fixing = $fixing;
        $tk->changing_part = $changing_part;
        $tk->source = $source;
        $tk->filename = $filename;
        $tk->save();

        //Move Uploaded File
        $destinationPath = 'uploads';
        $tk->filename->move($destinationPath,$tk->filename->getClientOriginalName());

        return response()->json(
            [
                "status" => 200,
                "data" => "Data successfully updated"
            ],
            200
        );
    }

    public function delete ($id) {
        $tk = TechnicalKnowledge::find($id);
        $tk->delete();

        return response()->json(
            [
                "status" => 204,
                "data" => "Data successfully deleted"
            ],
            204
        );
    }
}
