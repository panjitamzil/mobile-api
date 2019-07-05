<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechnicalProblemCategory extends Model
{
    protected $table = 'technical_problem_categories';
    protected $fillable = ['name'];
}
