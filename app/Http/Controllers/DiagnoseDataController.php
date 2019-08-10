<?php

namespace App\Http\Controllers;

use App\DiagnoseData;
use Illuminate\Http\Request;

class DiagnoseDataController extends Controller
{
    public function index () {
        $diagnose = DiagnoseData::all();
        return response()->json(
            [
                "status" => 200,
                "data" => $diagnose
            ] ,
            200
        );
    }

    public function view (Request $request) {
        $diagnose = DiagnoseData::find($request->id);
        return response()->json(
            [
                "status" => 200,
                "data" => $diagnose
            ],
            200
        );
    }

    public function create (Request $request) {
        $diagnose = new DiagnoseData;
        $diagnose->no_police = $request->no_police;
        $diagnose->car_model_id = $request->car_model_id;
        $diagnose->customer_name = $request->customer_name;
        $diagnose->delivery_date = $request->delivery_date;
        $diagnose->transmisi_type_id = $request->transmisi_type_id;
        $diagnose->problem_component = $request->problem_component;
        $diagnose->since_at = $request->since_at;
        $diagnose->frequency = $request->frequency;
        $diagnose->engine_condition = $request->engine_condition;
        $diagnose->position_shift_lever = $request->position_shift_lever;
        $diagnose->speed = $request->speed;
        $diagnose->weight = $request->weight;
        $diagnose->engine_speed = $request->engine_speed;
        $diagnose->total_passenger = $request->total_passenger;
        $diagnose->odometer = $request->odometer;
        $diagnose->road_condition = $request->road_condition;
        $diagnose->traffic_condition = $request->traffic_condition;
        $diagnose->weather_condition = $request->weather_condition;
        $diagnose->outside_air_temperatur = $request->outside_air_temperatur;
        $diagnose->time_of_occurance = $request->time_of_occurance;
        $diagnose->ac_condition = $request->ac_condition;
        $diagnose->detail_inspection = $request->detail_inspection;
        $diagnose->dtc = $request->dtc;
        $diagnose->status = $request->status;
        $diagnose->main_analysis_problem = $request->main_analysis_problem;
        $diagnose->job_instruction = $request->job_instruction;
        $diagnose->foreman = $request->foreman;
        $diagnose->video_link = $request->video_link;
        $diagnose->need_dtr = $request->need_dtr;
        $diagnose->photo = $request->file('photo');
        $diagnose->save();

        //Move Uploaded File
        $destinationPath = 'uploads';
        $diagnose->photo->move($destinationPath,$diagnose->photo->getClientOriginalName());

        return response()->json(
            [
                "status" => 200,
                "data" => "Data successfully created"
            ],
            200
        );
    }

    public function update (Request $request, $id) {
        $diagnose = DiagnoseData::find($id);
        $diagnose->update($request->all());
        $diagnose->save();

        return response()->json(
            [
                "status" => 200,
                "data" => "Data successfully updated"
            ],
            200
        );
    }

    public function delete ($id) {
        $diagnose = DiagnoseData::find($id);
        $diagnose->delete();

        return response()->json(
            [
                "status" => 204,
                "data" => "Data successfully deleted"
            ],
            204
        );
    }
}
