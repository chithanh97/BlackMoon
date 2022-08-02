<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
use Session;
use Illuminate\Pagination\Paginator;

class ConfigController extends Controller
{

	public function edit(){
		$item = Config::latest('id')->first();
		// $item = $item[0];
		return view('backend.page.config.edit', compact('item'));
	}

	public function update(Request $request){

		$name = $request->name;
		$domain = $request->domain;
		$money = $request->money;
		$title = $request->title;
		$description = $request->description;
		$keyword = $request->keyword;
		$ua = $request->ua;
		$ga = $request->ga;
		$pixcel = $request->pixcel;
		$emailserver = $request->emailserver;
		$passserver = $request->passserver;
		$certificate = $request->certificate;
		$phone = $request->phone;
		$hotline = $request->hotline;
		$email = $request->email;
		$address = $request->address;
		$headcode = $request->headcode;
		$certificate = $request->certificate;
		$bodycode = $request->bodycode;
		$logo = $request->logo == '' ? getImageDefault() : $request->logo;
		$favicon = $request->favicon == '' ? getImageDefault() : $request->favicon;

		$item = Config::latest('id')->first();
		$cate = Config::findOrFail($item->id);

		$reponse = $cate->update([
			'name'   => $name,
			'domain'   => $domain,
			'money'   => $money,
			'title'   => $title,
			'description'   => $description,
			'keyword'   => $keyword,
			'ua'   => $ua,
			'ga'   => $ga,
			'pixcel'   => $pixcel,
			'emailserver'   => $emailserver,
			'passserver'   => $passserver,
			'certificate'   => $certificate,
			'phone'   => $phone,
			'hotline'   => $hotline,
			'email'   => $email,
			'address'   => $address,
			'headcode'   => $headcode,
			'bodycode'   => $bodycode,
			'logo'   => $logo,
			'favicon'   => $favicon,
		]);
		if($reponse){
			return redirect()->route('config.edit')->with('alert', '- Chỉnh sửa thành công!');
		}
		return redirect()->back()->withInput()->with('alert', '- Chỉnh sửa thất bại!');
	}

}