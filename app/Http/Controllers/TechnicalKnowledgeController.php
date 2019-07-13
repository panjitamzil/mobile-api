<?php

namespace App\Http\Controllers;

use App\TechnicalKnowledge;
use Illuminate\Http\Request;

class TechnicalKnowledgeController extends Controller
{
    public function index () {
        $tk = TechnicalKnowledge::all();
        return response()->json(
            [
                "status" => 200,
                "data" => $tk
            ] ,
            200
        );
    }

    public function view (Request $request) {
        $tk = TechnicalKnowledge::find($request->id);
        return response()->json(
            [
                "status" => 200,
                "data" => $tk
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
        $tk->filename = $request->filename;
        $tk->save();

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
        $filename = $request->filename;

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
