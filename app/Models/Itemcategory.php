<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model

{
	protected $table = 'itemcategory';

	protected $fillable = [
		'id',
		'name',
		'email',
		'password',
		'name',
		'subject',
		'parent',
		'detail',
		'detail_short',
		'image',
		'link',
		'sort',
		'hot',
		'status',
		'title',
		'description',
		'keyword',
		'lang',
	];

}
