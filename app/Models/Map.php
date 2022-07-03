<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Map extends Model

{
  protected $table = 'map';

  protected $fillable = [
    'id',
    'name',
    'detail',
    'sort',
    'status',
    'lang',
  ];

}
