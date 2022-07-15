<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menuitems extends Model
{
	protected $table = 'menuitems';

	protected $fillable = [
		'id',
		'title',
		'name',
		'slug',
		'type',
		'target',
		'menu_id',
		'created_at',
		'updated_at'
	];
}