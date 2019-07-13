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
        $diagnose->photo = $request->photo;
        $diagnose->save();

        return response()->json(
            [
                "status" => 200,
                "data" => "Data successfully created"
            ],
            200
        );
    }

    public function update (Request $request, $id) {
        $no_police = $request->no_police;
        $car_model_id = $request->car_model_id;
        $customer_name = $request->customer_name;
        $delivery_date = $request->delivery_date;
        $transmisi_type_id = $request->transmisi_type_id;
        $problem_component = $request->problem_component;
        $since_at = $request->since_at;
        $frequency = $request->frequency;
        $engine_condition = $request->engine_condition;
        $position_shift_lever = $request->position_shift_lever;
        $speed = $request->speed;
        $weight = $request->weight;
        $engine_speed = $request->engine_speed;
        $total_passenger = $request->total_passenger;
        $odometer = $request->odometer;
        $road_condition = $request->road_condition;
        $traffic_condition = $request->traffic_condition;
        $weather_condition = $request->weather_condition;
        $outside_air_temperatur = $request->outside_air_temperatur;
        $time_of_occurance = $request->time_of_occurance;
        $ac_condition = $request->ac_condition;
        $detail_inspection = $request->detail_inspection;
        $dtc = $request->dtc;
        $status = $request->status;
        $main_analysis_problem = $request->main_analysis_problem;
        $job_instruction = $request->job_instruction;
        $foreman = $request->foreman;
        $video_link = $request->video_link;
        $need_dtr = $request->need_dtr;
        $photo = $request->photo;

        $diagnose = DiagnoseData::find($id);
        $diagnose->no_police = $no_police;
        $diagnose->car_model_id = $car_model_id;
        $diagnose->customer_name = $customer_name;
        $diagnose->delivery_date = $delivery_date;
        $diagnose->transmisi_type_id = $transmisi_type_id;
        $diagnose->problem_component = $problem_component;
        $diagnose->since_at = $since_at;
        $diagnose->frequency = $frequency;
        $diagnose->engine_condition = $engine_condition;
        $diagnose->position_shift_lever = $position_shift_lever;
        $diagnose->speed = $speed;
        $diagnose->weight = $weight;
        $diagnose->engine_speed = $engine_speed;
        $diagnose->total_passenger = $total_passenger;
        $diagnose->odometer = $odometer;
        $diagnose->road_condition = $road_condition;
        $diagnose->traffic_condition = $traffic_condition;
        $diagnose->weather_condition = $weather_condition;
        $diagnose->outside_air_temperatur = $outside_air_temperatur;
        $diagnose->time_of_occurance = $time_of_occurance;
        $diagnose->ac_condition = $ac_condition;
        $diagnose->detail_inspection = $detail_inspection;
        $diagnose->dtc = $dtc;
        $diagnose->status = $status;
        $diagnose->main_analysis_problem = $main_analysis_problem;
        $diagnose->job_instruction = $job_instruction;
        $diagnose->foreman = $foreman;
        $diagnose->video_link = $video_link;
        $diagnose->need_dtr = $need_dtr;
        $diagnose->photo = $photo;
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
