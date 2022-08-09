<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Config;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

use Session;
use Mail;

class ContactController extends Controller
{
	public function show(){
		return view('frontend.page.contact');
	}
	public function save(Request $request){
		$messages = [
			'name.required' => '- Tên không được để trống!',
			'phone.required' => '- Số điện thoại không được để trống!',
		];

		$validator = $request->validate([
			'name'   => 'required',
			'phone'   => 'required',
		], $messages);

		$temp = Mail::send('frontend.mailcontact', array(
			'name' => $request->name,
			'phone' => $request->phone,
			'note' => $request->note
		), function($message){

			$config = Config::orderBy('id', 'DESC')->first();
			$message->from('ncthanh@vsetgroup.com', 'Thông tin liên hệ');
			$message->to($config->email, 'Thông tin liên hệ')->subject('Thông tin liên hệ');

		});
		if($temp) {
			return redirect()->route('front.contact')->with('alert', 'Gửi thông tin thành công');
		} else {
			return redirect()->route('front.contact')->with('alert', 'Gửi thông tin thất bại');
		}
	}
}