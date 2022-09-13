<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class ItemCategory extends Model

{
	protected $table = 'itemcategory';

	use HasFactory, Searchable;

	protected $fillable = [
		'id',
		'code',
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
