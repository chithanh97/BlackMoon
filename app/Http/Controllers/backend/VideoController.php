<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Session;
use Illuminate\Pagination\Paginator;

class VideoController extends Controller
{
	public function index()
	{
		$list = Video::orderby('id','DESC')->paginate(10)->withQueryString();
		return view('backend.page.video.index', compact('list'));
	}

	public function store(){
		return view('backend.page.video.store');
	}

	public function create(Request $request){
		$messages = [
			'name.required' => '- Tên không được để trống!',
			'sort.numeric' => '- Thứ tự phải là số tự nhiên!'
		];

		$validator = $request->validate([
			'name'   => 'required',
			'sort' => 'numeric'
		], $messages);

		$name = $request->name;
		$link = $request->link;
		$sort = $request->sort == '' ? 0 : $request->sort;
		$reponse = Video::create([
			'name'   => $name,
			'status' => 1,
			'link' => $link,
			'sort' => $sort,
			'lang' => 1
		]);
		if($reponse){
			return redirect()->route('video')->with('alert', '- Thêm thành công!');
		}
		return redirect()->back()->withInput();
	}

	public function delete($id){
		$res = $this->deleteItem($id);
		if($res) return redirect()->route('video')->with('alert', '- Xóa thành công!');
		return redirect()->route('video')->with('alert', '- Xóa thất bại!');
	}

	public function deleteItem($id){
		$res = Video::find($id)->delete();
		return $res;
	}

	public function deleteAll(Request $request){

		$count = 0;

		foreach (json_decode($request->value) as $key => $value) {
			if($this->deleteItem($value)) $count++;
		}

		return redirect()->route('video')->with('alert', '- Đã xóa '.$count.' danh mục!');
	}

	public function edit($id){
		$item = Video::findOrFail($id);
		// $item = $item[0];
		return view('backend.page.video.edit', compact('item'));
	}

	public function update($id, Request $request){
		$messages = [
			'name.required' => '- Tên không được để trống!',
			'sort.numeric' => '- Thứ tự phải là số tự nhiên!'
		];

		$validator = $request->validate([
			'name'   => 'required',
			'sort' => 'numeric'
		], $messages);

		$name = $request->name;
		$link = $request->link;
		$sort = $request->sort == '' ? 0 : $request->sort;

		$cate = Video::findOrFail($id);

		$reponse = $cate->update([
			'name'   => $name,
			'status' => 1,
			'link' => $link,
			'sort' => $sort,
			'lang' => 1
		]);
		if($reponse){
			return redirect()->route('video')->with('alert', '- Chỉnh sửa thành công!');
		}
		return redirect()->back()->withInput();
	}

}