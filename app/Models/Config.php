<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model

{
	protected $table = 'config';

	protected $fillable = [
		'id',
		'name',
		'logo',
		'favicon',
		'domain',
		'monney',
		'title',
		'description',
		'keyword',
		'ua',
		'pixcel',
		'ga',
		'mailserver',
		'passserver',
		'certificate',
		'phone',
		'hotline',
		'email',
		'address',
		'headcode',
		'bodycode',
	];

}
