<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Passreset extends Model

{
	protected $table = 'password_resets';

	protected $fillable = [
		'id',
		'email',
		'token',
		'created_at',
	];

}
