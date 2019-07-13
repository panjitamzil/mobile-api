<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProblemComponent extends Model
{
    protected $table = 'problem_component';
    protected $fillable = ['name'];
}
