<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiagnoseData extends Model
{
    protected $table = 'diagnose_data';
    protected $fillable = ['no_police', 'car_model_id', 'customer_name', 'delivery_date', 'transmisi_type_id', 'problem_component', 'since_at', 'frequency', 'engine_condition', 'position_shift_lever', 'speed', 'weight', 'engine_speed', 'total_passenger', 'odometer', 'road_condition', 'traffic_condition', 'weather_condition', 'outside_air_temperatur', 'time_of_occurance', 'ac_condition', 'detail_inspection', 'dtc', 'status', 'main_analysis_problem', 'job_instruction', 'foreman', 'video_link', 'need_dtr', 'photo'];
}
