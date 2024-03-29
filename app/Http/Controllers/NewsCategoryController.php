<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newscategory;
use App\Models\News;
use Session;
use Illuminate\Pagination\Paginator;

class NewsCategoryController extends Controller
{
	public function index(Request $request)
	{
		$where = [];
		$list = Newscategory::orderby('id','DESC')->paginate(10)->withQueryString();
		if($request->parent == 0) $request->parent = null;
		if(isset($request->parent) && isset($request->key)){
			$list = Newscategory::search($request->key)->where('code', $request->parent)->orderby('id','DESC')->paginate(10)->withQueryString();
		} else if(isset($request->key)){
			$list = Newscategory::search($request->key)->orderby('id','DESC')->paginate(10)->withQueryString();
		} else if(isset($request->parent)) {
			$list = Newscategory::where('code', $request->parent)->orderby('id','DESC')->paginate(10)->withQueryString();
		}
		$parent = Newscategory::get();
		return view('backend.page.newscategory.index', compact('list', 'parent', 'request'));
	}

	public function store(){
		$parent = Newscategory::where('status', 1)->get();
		return view('backend.page.newscategory.store', compact('parent'));
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
		$code = 'NEWS'.rand(10000000, 99999999);
		$parent = $request->parent == '' ? 0 : $request->parent;
		$image = $request->image == '' ? getImageDefault() : $request->image;
		$detail = $request->detail;
		$title = $request->title;
		$description = $request->description;
		$keyword = $request->keyword;
		$link = $request->link;
		$subject = $request->subject;
		$sort = $request->sort == '' ? 0 : $request->sort;

		$reponse = Newscategory::create([
			'name'   => $name,
			'code'   => $code,
			'subject'   => $subject,
			'parent' => $parent,
			'image' => $image,
			'status' => 1,
			'detail' => $detail,
			'title' => $title,
			'description' => $description,
			'keyword' => $keyword,
			'link' => $link,
			'subject' => $subject,
			'sort' => $sort,
			'lang' => 1
		]);
		if($reponse){
			changeSitemap();
			return redirect()->route('newscategory')->with('alert', '- Thêm thành công!');
		}
		return redirect()->back()->withInput();
	}

	public function delete($id){
		$res = $this->deleteItem($id);
		changeSitemap();
		if($res) return redirect()->route('newscategory')->with('alert', '- Xóa thành công!');
		return redirect()->route('newscategory')->with('alert', '- Xóa thất bại!');
	}

	public function deleteItem($id){
		$res = Newscategory::find($id)->delete();
		return $res;
	}

	public function deleteAll(Request $request){

		$count = 0;

		foreach (json_decode($request->value) as $key => $value) {
			if($this->deleteItem($value)) $count++;
		}
		changeSitemap();
		return redirect()->route('newscategory')->with('alert', '- Đã xóa '.$count.' danh mục!');
	}

	public function edit($id){
		$parent = Newscategory::where('status', 1)->get();
		$item = Newscategory::findOrFail($id);
		return view('backend.page.newscategory.edit', compact('parent', 'item'));
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
		$image = $request->image == '' ? getImageDefault() : $request->image;
		$detail = $request->detail;
		$title = $request->title;
		$description = $request->description;
		$keyword = $request->keyword;
		$link = $request->link;
		$subject = $request->subject;
		$sort = $request->sort == '' ? 0 : $request->sort;

		$cate = Newscategory::findOrFail($id);

		$reponse = $cate->update([
			'name'   => $name,
			'subject'   => $subject,
			'parent' => $parent,
			'image' => $image,
			'status' => 1,
			'detail' => $detail,
			'title' => $title,
			'description' => $description,
			'keyword' => $keyword,
			'link' => $link,
			'subject' => $subject,
			'sort' => $sort,
			'lang' => 1
		]);
		if($reponse){
			changeSitemap();
			return redirect()->route('newscategory')->with('alert', '- Chỉnh sửa thành công!');
		}
		return redirect()->route('newscategory.edit', $id);
	}

	function show($subject){
		$category = Newscategory::where('subject', $subject)->first();
		if(isset($category) > 0) {
			$listNews = News::where('parent', 'like', "%".$category->code."%")->where('status', 1)->orderby('id','DESC')->paginate(12)->withQueryString();
			return view('frontend.page.newscategory', compact('listNews', 'category'));
		} else {
			return view('error');
		}
	}
}