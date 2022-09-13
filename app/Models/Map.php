<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Map extends Model

{
  protected $table = 'map';

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
