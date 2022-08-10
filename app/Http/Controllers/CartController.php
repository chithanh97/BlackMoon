<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Items;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

use Cart;
use Session;

class CartController extends Controller
{
	function saveCart(Request $request){
		$item = Items::find($request->id);
		$price = $item->price;

		if($item->sell_percent != null && $item->sell_percent != 0){
			$price = $price - ($price * $item->sell_percent / 100);
		} else if($item->sell_price != null){
			$price = $item->sell_price;
		}

		$data = [
			'id' => $item->id,
			'qty' => $request->qty,
			'name' => $item->name,
			'price' => $price,
			'weight' => '12',
			'options' => [
				'image' => getFirstImage($item->image),
				'subject' => $item->subject,
			],
		];

		Cart::add($data);

		echo Cart::count();
	}

	public function deleteCart($rowId)
	{
		Cart::remove($rowId);

		return redirect()->back();
	}

	public function updateQuantity(Request $request, $rowId)
	{
		Cart::update($rowId, $request->input('update_qty'));

		return redirect()->back();
	}

	public function deleteAllCart(){
		Cart::destroy();
		return redirect()->back();
	}

	public function showCart(){
		return view('frontend.page.cart');
	}
}