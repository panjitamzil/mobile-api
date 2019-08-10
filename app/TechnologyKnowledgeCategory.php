<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class TechnologyKnowledgeCategory extends Model
{
    protected $table = 'technology_knowledge_categories';
    protected $fillable = ['name', 'slug'];

    public function technologies () {
      return $this->hasMany('App\TechnologyKnowledge', 'technology_knowledge_category_id');
    }     

    public function getCreatedAtAttribute($date)
    {
      return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d H:i:s');
    }
}
