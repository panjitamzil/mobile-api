<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductKnowladgeCategory extends Model
{
    protected $table = 'product_knowladge_categories';
    protected $fillable = ['name'];
}
