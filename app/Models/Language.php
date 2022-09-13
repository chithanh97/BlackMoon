<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Language extends Model

{
  protected $table = 'language';

  use HasFactory, Searchable;

  protected $fillable = [
    'id',
    'name',
    'image',
    'status',
  ];

}
