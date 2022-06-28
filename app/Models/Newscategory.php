<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newscategory extends Model

{
	protected $table = 'newscategory';

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
