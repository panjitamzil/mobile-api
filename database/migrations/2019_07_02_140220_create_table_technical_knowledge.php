<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTechnicalKnowledge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technical_knowledge', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('car_model_id');
            $table->unsignedInteger('technical_problem_category_id');
            $table->string('component')->nullable();
            $table->string('complaint')->nullable();
            $table->string('analysis')->nullable();
            $table->string('fixing')->nullable();
            $table->string('changing_part')->nullable();
            $table->string('source')->nullable();
            $table->string('filename')->nullable();
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
        Schema::dropIfExists('technical_knowledge');
    }
}
