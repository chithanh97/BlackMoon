<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Social;
use Session;
use Illuminate\Pagination\Paginator;

class SocialController extends Controller
{
	public function index()
	{
		$list = Social::orderby('id','DESC')->paginate(10)->withQueryString();
		return view('backend.page.social.index', compact('list'));
	}

	public function store(){
		return view('backend.page.social.store');
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
		$image = $request->image == '' ? '/storage/uploads/default/default.png' : $request->image;
		$sort = $request->sort == '' ? 0 : $request->sort;
		$reponse = Social::create([
			'name'   => $name,
			'status' => 1,
			'link' => $link,
			'image' => $image,
			'sort' => $sort,
			'lang' => 1
		]);
		if($reponse){
			return redirect()->route('social')->with('alert', '- Thêm thành công!');
		}
		return redirect()->back()->withInput();
	}

	public function delete($id){
		$res = Social::find($id)->delete();
		return redirect()->route('social')->with('alert', '- Xóa thành công!');
	}

	public function edit($id){
		$item = Social::findOrFail($id);
		// $item = $item[0];
		return view('backend.page.social.edit', compact('item'));
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
		$image = $request->image == '' ? '/storage/uploads/default/default.png' : $request->image;
		$sort = $request->sort == '' ? 0 : $request->sort;

		$cate = Social::findOrFail($id);

		$reponse = $cate->update([
			'name'   => $name,
			'status' => 1,
			'link' => $link,
			'image' => $image,
			'sort' => $sort,
			'lang' => 1
		]);
		if($reponse){
			return redirect()->route('social')->with('alert', '- Chỉnh sửa thành công!');
		}
		return redirect()->back()->withInput();
	}

}