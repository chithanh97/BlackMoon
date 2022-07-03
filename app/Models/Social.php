<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model

{
  protected $table = 'social';

  protected $fillable = [
    'id',
    'name',
    'image',
    'link',
    'sort',
    'status',
    'sort',
    'lang',
  ];

}
