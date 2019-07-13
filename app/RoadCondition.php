<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoadCondition extends Model
{
    protected $table = 'road_condition';
    protected $fillable = ['name'];
}
