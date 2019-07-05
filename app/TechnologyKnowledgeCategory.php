<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechnologyKnowledgeCategory extends Model
{
    protected $table = 'technology_knowledge_categories';
    protected $fillable = ['name', 'slug'];
}
