<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Items;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\Order;
use App\Models\Orderỉtem;

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

	public function deleteCart(Request $request)
	{
		Cart::remove($request->id);
	}

	public function updateQuantity(Request $request)
	{
		Cart::update($request->id, $request->qty);

		echo Cart::count();
	}

	public function deleteAllCart(){
		Cart::destroy();
		return redirect()->back();
	}

	public function showCart(){
		return view('frontend.page.cart');
	}

	public function payCart(){
		$listProvince = Province::get();
		return view('frontend.page.paycart', compact('listProvince'));
	}

	public function saveOrder(Request $request){
		$messages = [
			'name.required' => '- Tên không được để trống!',
			'phone.required' => '- Số điện thoại không được để trống!',
			'address.required' => '- Địa chỉ không được để trống!',
		];

		$validator = $request->validate([
			'name'   => 'required',
			'phone'   => 'required',
			'address'   => 'required',
		], $messages);

		print_r($request->all());
	}

	public function getDistrict(Request $request){
		$listDistrict = District::where('_province_id', $request->id)->get();
		echo '<option value="0">Chọn Quận/Huyện</option>';
		foreach ($listDistrict as $key => $value) {
			echo '<option value="'.$value->id.'">'.$value->_name.'</option>';
		}
	}

	public function getWard(Request $request){
		$listWard = Ward::where('_district_id', $request->id)->get();
		echo '<option value="0">Chọn Phường/Xã</option>';
		foreach ($listWard as $key => $value) {
			echo '<option value="'.$value->id.'">'.$value->_name.'</option>';
		}
	}
}