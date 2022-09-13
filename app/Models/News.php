<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class News extends Model

{
	protected $table = 'news';

	use HasFactory, Searchable;

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
