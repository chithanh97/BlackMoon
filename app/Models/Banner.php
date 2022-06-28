<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model

{
	protected $table = 'banner';

	protected $fillable = [
		'id',
		'name',
		'type',
		'image',
		'link',
		'status',
		'lang',
	];

}
