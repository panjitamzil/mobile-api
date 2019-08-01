<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductKnowladge extends Model
{
    protected $table = 'product_knowladge';
    protected $fillable = ['car_model_id', 'product_knowlagde_category_id', 'filename'];

    public function carModel()
    {
      return $this->belongsTo('App\CarModel', 'car_model_id');
    }

    public function product_knowlagde_category()
    {
      return $this->belongsTo('App\ProductKnowladgeCategory', 'product_knowlagde_category_id');
    }
}
