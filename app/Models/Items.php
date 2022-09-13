<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Items extends Model

{

	use HasFactory, Searchable;

	protected $table = 'items';

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
		'view',
		'buy',
		'status',
		'title',
		'description',
		'keyword',
		'lang',
		'created_at'
	];

}
