<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechnologyKnowledge extends Model
{
    protected $table = 'technology_knowledge';
    protected $fillable = ['technology_knowledge_category_id', 'filename'];
}
