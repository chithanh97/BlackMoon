<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model

{
	protected $table = 'order';

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
	];

	public function orderItem(){
		return $this->hasMany('Orderitem', 'id');
	}

}
