<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Slide extends Model

{
	protected $table = 'slide';

	use HasFactory, Searchable;

	protected $fillable = [
		'id',
		'name',
		'image',
		'link',
		'status',
		'lang',
	];

}
