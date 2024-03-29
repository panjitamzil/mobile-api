<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechnicalKnowledge extends Model
{
    protected $table = 'technical_knowledge';
    protected $fillable = ['car_model_id', 'technical_problem_category_id', 'component', 'complaint', 'analysis', 'fixing', 'changing_part', 'source', 'filename'];

    public function carModel()
    {
      return $this->belongsTo('App\CarModel', 'car_model_id');
    }

    public function technical_problem_category()
    {
      return $this->belongsTo('App\TechnicalProblemCategory', 'technical_problem_category_id');
    }
}
