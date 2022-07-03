<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fanpage extends Model

{
  protected $table = 'fanpage';

  protected $fillable = [
    'id',
    'name',
    'detail',
    'sort',
    'status',
    'lang',
  ];

}
