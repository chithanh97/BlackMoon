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
		$list = News::paginate(10)->withQueryString();
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
		$image = $request->image == '' ? '/storage/uploads/default/default.png' : $request->image;
		$detail = $request->detail;
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
		$res = News::find($id)->delete();
		return redirect()->route('news')->with('alert', '- Xóa thành công!');
	}

	public function edit($id){
		$parent = Newscategory::where('status', 1)->get();
		$item = News::where('id', $id)->get();
		$item = $item[0];
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
		$parent = $request->parent == '' ? 0 : $request->parent;
		$image = $request->image == '' ? '/storage/uploads/default/default.png' : $request->image;
		$detail = $request->detail;
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

}