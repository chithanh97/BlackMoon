<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model

{
	protected $table = 'slide';

	protected $fillable = [
		'id',
		'name',
		'image',
		'link',
		'status',
		'lang',
	];

}
