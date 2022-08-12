<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model

{
	protected $table = 'ward';

	protected $fillable = [
		'id',
		'_name',
		'_province_id',
		'_district_id',
	];

}
