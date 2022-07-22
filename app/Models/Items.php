<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Items extends Model

{
	protected $table = 'news';

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
		'image_child',
		'price',
		'sell_price',
		'sell_percent',
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
