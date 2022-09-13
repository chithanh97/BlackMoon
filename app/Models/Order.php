<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Order extends Model

{
	protected $table = 'order';

	use HasFactory, Searchable;

	protected $fillable = [
		'id',
		'order_code',
		'province',
		'district',
		'ward',
		'ship',
		'name',
		'phone',
		'email',
		'address',
		'note',
		'total',
		'status',
		'pay_method',
		'created_at'
	];

	public function orderItem(){
		return $this->hasMany('Orderitem', 'id');
	}

}
