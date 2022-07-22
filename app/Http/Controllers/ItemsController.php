<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Items;
use App\Models\Itemcategory;
use Session;
use Illuminate\Pagination\Paginator;

class ItemsController extends Controller
{
	public function index()
	{
		$list = Items::orderby('id','DESC')->paginate(10)->withQueryString();
		$parent = Itemcategory::get();
		return view('backend.page.items.index', compact('list', 'parent'));
	}

	public function store(){
		$parent = Itemcategory::where('status', 1)->get();
		return view('backend.page.items.store', compact('parent'));
	}

	public function create(Request $request){
		$messages = [
			'name.required' => '- Tên không được để trống!',
			'subject.required' => '- Đường dẫn không được để trống!',
			'sort.numeric' => '- Thứ tự phải là số tự nhiên!'
		];

		$validator = $request->validate([
			'name'   => 'required',
			'subject' => 'required',
			'sort' => 'numeric'
		], $messages);

		$name = $request->name;
		$parent = $request->parent == '' ? 0 : implode(',', $request->parent);
		$image = $request->image == '' ? '/storage/uploads/default/default.png' : $request->image;
		$detail = $request->detail;
		$detail_short = $request->detail_short;
		$title = $request->title;
		$description = $request->description;
		$keyword = $request->keyword;
		$link = $request->link;
		$subject = $request->subject;
		$sort = $request->sort == '' ? 0 : $request->sort;

		$reponse = Items::create([
			'name'   => $name,
			'subject'   => $subject,
			'parent' => $parent,
			'image' => $image,
			'status' => 1,
			'detail' => $detail,
			'detail_short' => $detail_short,
			'title' => $title,
			'description' => $description,
			'keyword' => $keyword,
			'link' => $link,
			'subject' => $subject,
			'sort' => $sort,
			'lang' => 1
		]);
		if($reponse){
			return redirect()->route('items')->with('alert', '- Thêm thành công!');
		}
		return redirect()->back()->withInput();
	}

	public function delete($id){
		$res = $this->deleteItem($id);
		if($res) return redirect()->route('items')->with('alert', '- Xóa thành công!');
		return redirect()->route('items')->with('alert', '- Xóa thất bại!');
	}

	public function deleteItem($id){
		$res = Items::find($id)->delete();
		return $res;
	}

	public function deleteAll(Request $request){

		$count = 0;

		foreach (json_decode($request->value) as $key => $value) {
			if($this->deleteItem($value)) $count++;
		}

		return redirect()->route('items')->with('alert', '- Đã xóa '.$count.' bài viết!');
	}

	public function edit($id){
		$parent = Itemcategory::where('status', 1)->get();
		$item = Items::findOrFail($id);
		return view('backend.page.items.edit', compact('parent', 'item'));
	}

	public function update($id, Request $request){
		$messages = [
			'name.required' => '- Tên không được để trống!',
			'subject.required' => '- Đường dẫn không được để trống!',
			'sort.numeric' => '- Thứ tự phải là số tự nhiên!'
		];

		$validator = $request->validate([
			'name'   => 'required',
			'subject' => 'required',
			'sort' => 'numeric'
		], $messages);

		$name = $request->name;
		$parent = $request->parent == '' ? 0 : $request->parent;
		$image = $request->image == '' ? '/storage/uploads/default/default.png' : $request->image;
		$detail = $request->detail;
		$detail_short = $request->detail_short;
		$title = $request->title;
		$description = $request->description;
		$keyword = $request->keyword;
		$link = $request->link;
		$subject = $request->subject;
		$sort = $request->sort == '' ? 0 : $request->sort;

		$cate = Items::findOrFail($id);

		$reponse = $cate->update([
			'name'   => $name,
			'subject'   => $subject,
			'parent' => $parent,
			'image' => $image,
			'image_child' => $image_child,
			'status' => 1,
			'detail' => $detail,
			'detail_short' => $detail_short,
			'title' => $title,
			'price' => $price,
			'sell_price' => $sell_price,
			'sell_percent' => $sell_percent,
			'description' => $description,
			'keyword' => $keyword,
			'link' => $link,
			'subject' => $subject,
			'sort' => $sort,
			'lang' => 1
		]);
		if($reponse){
			return redirect()->route('items')->with('alert', '- Chỉnh sửa thành công!');
		}
		return redirect()->route('items.edit', $id);
	}

}