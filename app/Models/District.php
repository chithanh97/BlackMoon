<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model

{
	protected $table = 'district';

	protected $fillable = [
		'id',
		'_name',
		'_province_id',
	];

}
