<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Session;
use Illuminate\Pagination\Paginator;

class BannerController extends Controller
{
	public function index()
	{
		$list = Banner::orderby('id','DESC')->paginate(10)->withQueryString();
		return view('backend.page.banner.index', compact('list'));
	}

	public function store(){
		return view('backend.page.banner.store');
	}

	public function create(Request $request){
		$messages = [
			'name.required' => '- Tên không được để trống!',
		];

		$validator = $request->validate([
			'name'   => 'required',
		], $messages);

		$name = $request->name;
		$image = $request->image == '' ? getImageDefault() : $request->image;
		$link = $request->link;
		$type = $request->type;

		$reponse = Banner::create([
			'name'   => $name,
			'image' => $image,
			'status' => 1,
			'type' => $type,
			'link' => $link,
			'lang' => 1
		]);
		if($reponse){
			return redirect()->route('banner')->with('alert', '- Thêm thành công!');
		}
		return redirect()->back()->withInput();
	}

	public function delete($id){
		$res = $this->deleteItem($id);
		if($res) return redirect()->route('banner')->with('alert', '- Xóa thành công!');
		return redirect()->route('banner')->with('alert', '- Xóa thất bại!');
	}

	public function deleteItem($id){
		$res = Banner::find($id)->delete();
		return $res;
	}

	public function deleteAll(Request $request){

		$count = 0;

		foreach (json_decode($request->value) as $key => $value) {
			if($this->deleteItem($value)) $count++;
		}

		return redirect()->route('banner')->with('alert', '- Đã xóa '.$count.' banner!');
	}

	public function edit($id){
		$item = Banner::findOrFail($id);
		// $item = $item[0];
		return view('backend.page.banner.edit', compact('item'));
	}

	public function update($id, Request $request){
		$messages = [
			'name.required' => '- Tên không được để trống!',
		];

		$validator = $request->validate([
			'name'   => 'required',
		], $messages);

		$name = $request->name;
		$image = $request->image == '' ? getImageDefault() : $request->image;
		$link = $request->link;
		$type = $request->type;

		$cate = Banner::findOrFail($id);

		$reponse = $cate->update([
			'name'   => $name,
			'image' => $image,
			'link' => $link,
			'type' => $type,
			'lang' => 1
		]);
		if($reponse){
			return redirect()->route('banner')->with('alert', '- Chỉnh sửa thành công!');
		}
		return redirect()->route('banner.edit', $id);
	}

}