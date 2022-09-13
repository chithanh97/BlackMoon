<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Fanpage extends Model

{
  protected $table = 'fanpage';

  use HasFactory, Searchable;

  protected $fillable = [
    'id',
    'name',
    'detail',
    'sort',
    'status',
    'lang',
  ];

}
