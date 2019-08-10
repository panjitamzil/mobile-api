<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $table = 'car_model';
    protected $fillable = ['name'];

    public function getCreatedAtAttribute($date)
    {
      return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d H:i:s');
    }    

    public function technical_knowladge () {
      return $this->hasMany('App\TechnicalKnowledge', 'car_model_id'); 
    }
}
