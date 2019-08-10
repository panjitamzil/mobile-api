<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ProductKnowladgeCategory extends Model
{
    protected $table = 'product_knowladge_categories';
    protected $fillable = ['name'];

    public function getCreatedAtAttribute($date)
    {
      return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d H:i:s');
    }    

    public function products () {
      return $this->hasMany('App\ProductKnowladge', 'product_knowlagde_category_id');
    }
}
