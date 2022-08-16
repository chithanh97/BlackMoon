<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model

{
	protected $table = 'order_item';

	protected $fillable = [
		'id',
		'id_item',
		'id_order',
		'name',
		'qty',
		'image',
		'subject',
		'price',
		'sell_price',
		'percent_price',
	];

	public function order()
	{
		return $this->belongsTo('Order', 'id');
	}

}
