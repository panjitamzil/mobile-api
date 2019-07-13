<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransmisiType extends Model
{
    protected $table = 'transmisi_type';
    protected $fillable = ['name'];
}
