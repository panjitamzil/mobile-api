<?php

namespace App\Http\Controllers;

use URL;
use App\TechnologyKnowledge;
use Illuminate\Http\Request;
use App\Http\Resources\TechnologyKnowledgeJSON as Builder;

class TechnologyKnowledgeController extends Controller
{
    public function index () {
        $tk = TechnologyKnowledge::with('category')->get();
        return response()->json(
            [
                "status" => 200,
                "data" => Builder::collection($tk)
            ] ,
            200
        );
    }

    public function view (Request $request) {
        $tk = TechnologyKnowledge::find($request->id);
        return response()->json(
            [
                "status" => 200,
                "data" => new Builder($tk)
            ],
            200
        );
    }

    public function create (Request $request) {
        $tk = new TechnologyKnowledge;
        $tk->technology_knowledge_category_id = $request->technology_knowledge_category_id;

        $destinationPath = 'uploads';
        $file = $request->file('filename');
        $filename = 123 .'-'.substr( md5( 123 . '-' . time() ), 0, 15) . '.'. $file->getClientOriginalExtension();
        $file->move($destinationPath, $filename);

        $tk->filename = URL::to('/'). '/uploads/' . $filename;
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
        $technology_knowledge_category_id = $request->technology_knowledge_category_id;

        $tk = TechnologyKnowledge::find($id);
        $tk->technology_knowledge_category_id = $technology_knowledge_category_id;

        $destinationPath = 'uploads';

        $file = $request->file('filename');
        $filename = 123 .'-'.substr( md5( 123 . '-' . time() ), 0, 15) . '.'. $file->getClientOriginalExtension();
        $file->move($destinationPath, $filename);

        $tk->filename = URL::to('/'). '/uploads/' . $filename;
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
