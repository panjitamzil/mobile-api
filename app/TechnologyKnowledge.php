<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class TechnologyKnowledge extends Model
{
    protected $table = 'technology_knowledge';
    protected $fillable = ['technology_knowledge_category_id', 'filename'];
    
    public function category () {
      return $this->belongsTo('App\TechnologyKnowledgeCategory', 'technology_knowledge_category_id');
    }

    public function getCreatedAtAttribute($date)
    {
      return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d H:i:s');
    }
}
