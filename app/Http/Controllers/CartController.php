<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Items;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\Order;
use App\Models\Orderitem;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

use Cart;
use Session;

class CartController extends Controller
{

	public function index(){
		$list = Order::orderby('id','DESC')->paginate(10)->withQueryString();
		return view('backend.page.order.index', compact('list'));
	}

	public function saveCart(Request $request){
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
				'sell_price' => ($item->price - $price),
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

		$order = Order::create([
			'order_code' => 'BM'.rand(100000, 999999),
			'province' => $request->province,
			'district' => $request->district,
			'ward' => $request->ward,
			'ship' => 0,
			'name' => $request->name,
			'phone' => $request->phone,
			'email' => $request->email,
			'address' => $request->address,
			'note' => $request->note,
			'total' => str_replace('.', '', Cart::total()),
			'status' => 1,
			'pay_method' => $request->pay_method,
		]);

		foreach (Cart::content() as $key => $value) {
			$temp = Orderitem::create([
				'id_item' => $value->id,
				'id_order' => $order->id,
				'name' => $value->name,
				'qty' => $value->qty,
				'image' => $value->options->image,
				'subject' => $value->options->subject,
				'price' => $value->price,
				'sell_price' => $value->options->sell_price == '' ? 0 : $value->options->sell_price,
			]);
			if($temp){
				Cart::remove($value->rowId);
				Items::find($value->id)->increment('buy', $value->qty);
			}
		}

		return redirect()->route('cart.thanks', $order->order_code);
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

	public function thanks($idOrder){
		$order = Order::where('order_code', $idOrder)->first();
		return view('frontend.page.thanks', compact('order'));
	}

	public function changeStatus(Request $request){

		$item = Order::findOrFail($request->id);

		$response = $item->update([
			'status' => $request->status,
		]);

		if($response) echo 'Thay đổi thành công!';
		else echo 'Thay đổi thất bại!';
	}

	public function showOrder($id){
		$item = Order::findOrFail($id);
		$listItem = Orderitem::where('id_order', $item->id)->get();
		$province = '';
		$district = '';
		$ward = '';
		$sell = 0;
		if($item->province != 0 && $item->district != 0 && $item->ward != 0) {
			$province = Province::findOrFail($item->province);
			$district = District::findOrFail($item->district);
			$ward = Ward::findOrFail($item->ward);
		}
		return view('backend.page.order.view', compact('item', 'listItem', 'province', 'district', 'ward', 'sell'));
	}
}