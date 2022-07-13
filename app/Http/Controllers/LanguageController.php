<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use Session;
use Illuminate\Pagination\Paginator;

class LanguageController extends Controller
{
	public function index()
	{
		$list = Language::orderby('id','DESC')->paginate(10)->withQueryString();
		return view('backend.page.language.index', compact('list'));
	}

	public function store(){
		return view('backend.page.language.store');
	}

	public function create(Request $request){
		$messages = [
			'name.required' => '- Tên không được để trống!',
		];

		$validator = $request->validate([
			'name'   => 'required',
		], $messages);

		$name = $request->name;
		$image = $request->image == '' ? '/storage/uploads/default/default.png' : $request->image;
		$reponse = Language::create([
			'name'   => $name,
			'status' => 1,
			'image' => $image,
			'lang' => 1
		]);
		if($reponse){
			return redirect()->route('language')->with('alert', '- Thêm thành công!');
		}
		return redirect()->back()->withInput();
	}

	public function delete($id){
		$res = Language::find($id)->delete();
		return redirect()->route('language')->with('alert', '- Xóa thành công!');
	}

	public function edit($id){
		$item = Language::findOrFail($id);
		// $item = $item[0];
		return view('backend.page.language.edit', compact('item'));
	}

	public function update($id, Request $request){
		$messages = [
			'name.required' => '- Tên không được để trống!',
		];

		$validator = $request->validate([
			'name'   => 'required',
		], $messages);

		$name = $request->name;
		$image = $request->image == '' ? '/storage/uploads/default/default.png' : $request->image;

		$cate = Language::findOrFail($id);

		$reponse = $cate->update([
			'name'   => $name,
			'status' => 1,
			'image' => $image,
			'lang' => 1
		]);
		if($reponse){
			return redirect()->route('language')->with('alert', '- Chỉnh sửa thành công!');
		}
		return redirect()->back()->withInput();
	}

}