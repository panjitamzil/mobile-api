<?php

namespace App\Http\Controllers;

use App\TechnologyKnowledge;
use Illuminate\Http\Request;

class TechnologyKnowledgeController extends Controller
{
    public function index () {
        $tk = TechnologyKnowledge::all();
        return response()->json(
            [
                "status" => 200,
                "data" => $tk
            ] ,
            200
        );
    }

    public function view (Request $request) {
        $tk = TechnologyKnowledge::find($request->id);
        return response()->json(
            [
                "status" => 200,
                "data" => $tk
            ],
            200
        );
    }

    public function create (Request $request) {
        $tk = new TechnologyKnowledge;
        $tk->technology_knowledge_category_id = $request->technology_knowledge_category_id;
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
        $technology_knowledge_category_id = $request->technology_knowledge_category_id;
        $filename = $request->file('filename');

        $tk = TechnologyKnowledge::find($id);
        $tk->technology_knowledge_category_id = $technology_knowledge_category_id;
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
        $tk = TechnologyKnowledge::find($id);
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
