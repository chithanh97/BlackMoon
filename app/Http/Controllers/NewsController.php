<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Newscategory;
use Session;
use Illuminate\Pagination\Paginator;

class NewsController extends Controller
{
	public function index()
	{
		$list = News::orderby('id','DESC')->paginate(10)->withQueryString();
		$parent = Newscategory::get();
		return view('backend.page.news.index', compact('list', 'parent'));
	}

	public function store(){
		$parent = Newscategory::where('status', 1)->get();
		return view('backend.page.news.store', compact('parent'));
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
		$image = $request->image == '' ? getImageDefault() : $request->image;
		$detail = $request->detail;
		$detail_short = $request->detail_short;
		$title = $request->title;
		$description = $request->description;
		$keyword = $request->keyword;
		$link = $request->link;
		$subject = $request->subject;
		$sort = $request->sort == '' ? 0 : $request->sort;

		$reponse = News::create([
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
			return redirect()->route('news')->with('alert', '- Thêm thành công!');
		}
		return redirect()->back()->withInput();
	}

	public function delete($id){
		$res = $this->deleteItem($id);
		if($res) return redirect()->route('news')->with('alert', '- Xóa thành công!');
		return redirect()->route('news')->with('alert', '- Xóa thất bại!');
	}

	public function deleteItem($id){
		$res = News::find($id)->delete();
		return $res;
	}

	public function deleteAll(Request $request){

		$count = 0;

		foreach (json_decode($request->value) as $key => $value) {
			if($this->deleteItem($value)) $count++;
		}

		return redirect()->route('news')->with('alert', '- Đã xóa '.$count.' bài viết!');
	}

	public function edit($id){
		$parent = Newscategory::where('status', 1)->get();
		$item = News::findOrFail($id);
		// $item = $item[0];
		// echo '<pre>';
		// print_r($item[0]->image);
		// echo '</pre>';
		return view('backend.page.news.edit', compact('parent', 'item'));
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
		$parent = $request->parent == '' ? 0 : implode(',', $request->parent);
		$image = $request->image == '' ? getImageDefault() : $request->image;
		$detail = $request->detail;
		$detail_short = $request->detail_short;
		$title = $request->title;
		$description = $request->description;
		$keyword = $request->keyword;
		$link = $request->link;
		$subject = $request->subject;
		$sort = $request->sort == '' ? 0 : $request->sort;

		$cate = News::findOrFail($id);

		$reponse = $cate->update([
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
			return redirect()->route('news')->with('alert', '- Chỉnh sửa thành công!');
		}
		return redirect()->route('news.edit', $id);
	}

	function show($subject){
		$news = News::where('subject', $subject)->where('status', 1)->first();
		return view('frontend.page.news', compact('news'));
	}
}