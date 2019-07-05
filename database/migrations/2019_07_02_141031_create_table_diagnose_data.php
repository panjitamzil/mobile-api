<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDiagnoseData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnose_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_police')->nullable();
            $table->unsignedInteger('car_model_id');
            $table->string('customer_name')->nullable();
            $table->date('delivery_date')->nullable();
            $table->unsignedInteger('transmisi_type_id');
            $table->string('problem_component')->nullable();
            $table->date('since_at')->nullable();
            $table->string('frequency')->nullable();
            $table->string('engine_condition')->nullable();
            $table->string('position_shift_lever')->nullable();
            $table->string('speed')->nullable();
            $table->string('weight')->nullable();
            $table->string('engine_speed')->nullable();
            $table->string('total_passenger')->nullable();
            $table->string('odometer')->nullable();
            $table->string('road_condition')->nullable();
            $table->string('traffic_condition')->nullable();
            $table->string('weather_condition')->nullable();
            $table->string('outside_air_temperatur')->nullable();
            $table->string('time_of_occurance')->nullable();
            $table->string('ac_condition')->nullable();
            $table->string('detail_inspection')->nullable();
            $table->string('dtc')->nullable();
            $table->string('status')->nullable();
            $table->string('main_analysis_problem')->nullable();
            $table->string('job_instruction')->nullable();
            $table->string('foreman')->nullable();
            $table->string('video_link')->nullable();
            $table->string('need_dtr')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnose_data');
    }
}
