<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProblemCategories extends Model
{
    protected $table = 'problem_categories';
    protected $fillable = ['name'];
}
