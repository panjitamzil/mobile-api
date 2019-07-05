<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductKnowladge extends Model
{
    protected $table = 'product_knowladge';
    protected $fillable = ['car_model_id', 'product_knowladge_category_id', 'filename'];
}
