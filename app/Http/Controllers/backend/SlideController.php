<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use Session;
use Illuminate\Pagination\Paginator;

class SlideController extends Controller
{
	public function index()
	{
		$list = Slide::orderby('id','DESC')->paginate(10)->withQueryString();
		return view('backend.page.slide.index', compact('list'));
	}

	public function store(){
		return view('backend.page.slide.store');
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

		$reponse = Slide::create([
			'name'   => $name,
			'image' => $image,
			'status' => 1,
			'link' => $link,
			'lang' => 1
		]);
		if($reponse){
			return redirect()->route('slide')->with('alert', '- Thêm thành công!');
		}
		return redirect()->back()->withInput();
	}

	public function delete($id){
		$res = $this->deleteItem($id);
		if($res) return redirect()->route('slide')->with('alert', '- Xóa thành công!');
		return redirect()->route('slide')->with('alert', '- Xóa thất bại!');
	}

	public function deleteItem($id){
		$res = Slide::find($id)->delete();
		return $res;
	}

	public function deleteAll(Request $request){

		$count = 0;

		foreach (json_decode($request->value) as $key => $value) {
			if($this->deleteItem($value)) $count++;
		}

		return redirect()->route('slide')->with('alert', '- Đã xóa '.$count.' slide!');
	}

	public function edit($id){
		$item = Slide::findOrFail($id);
		// $item = $item[0];
		return view('backend.page.slide.edit', compact('item'));
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

		$cate = Slide::findOrFail($id);

		$reponse = $cate->update([
			'name'   => $name,
			'image' => $image,
			'link' => $link,
			'lang' => 1
		]);
		if($reponse){
			return redirect()->route('slide')->with('alert', '- Chỉnh sửa thành công!');
		}
		return redirect()->route('slide.edit', $id);
	}

}