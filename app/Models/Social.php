<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

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
