<?php

namespace App\Http\Controllers;

use Session;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

use App\Http\Controllers\Controller;

use App\Models\Items;
use App\Models\Itemcategory;

class ItemsController extends Controller
{
	public function index()
	{
		$list = Items::orderby('id','DESC')->paginate(12)->withQueryString();
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
		$image = $request->all_image_child;
		$detail = $request->detail;
		$detail_short = $request->detail_short;
		$title = $request->title;
		$price = $request->price == '' ? 0 : $request->price;
		$sell_price = $request->sell_price;
		$sell_percent = $request->sell_percent;
		$description = $request->description;
		$keyword = $request->keyword;
		$link = $request->link;
		$subject = $request->subject;
		$sort = $request->sort == '' ? 0 : $request->sort;

		if($image != ''){
			$tempImage = json_decode($image);
			foreach ($tempImage as $key => $value) {
				if($value[1] == getImageDefault()){
					unset($tempImage[$key]);
				}
				// echo '<pre>';
				// print_r($value);
				// echo '</pre>';
			}
			if($tempImage == ''){
				$tempImage = ['IMGS_OTHER_11223344', getImageDefault()];
			}
		} else {
			$tempImage = ['IMGS_OTHER_11223344', getImageDefault()];
		}

		$tempImage = array_values($tempImage);

		$reponse = Items::create([
			'name'   => $name,
			'subject'   => $subject,
			'parent' => $parent,
			'image' => json_encode($tempImage),
			'status' => 1,
			'detail' => $detail,
			'price' => str_replace(',', '', $price),
			'sell_price' => $sell_price,
			'sell_percent' => $sell_percent,
			'detail_short' => $detail_short,
			'title' => $title,
			'description' => $description,
			'keyword' => $keyword,
			'link' => $link,
			'view' => 0,
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
		$parent = $request->parent == '' ? 0 : implode(',', $request->parent);
		$image = $request->all_image_child;
		$detail = $request->detail;
		$detail_short = $request->detail_short;
		$price = $request->price == '' ? 0 : $request->price;
		$sell_price = $request->sell_price;
		$sell_percent = $request->sell_percent;
		$title = $request->title;
		$description = $request->description;
		$keyword = $request->keyword;
		$link = $request->link;
		$subject = $request->subject;
		$sort = $request->sort == '' ? 0 : $request->sort;

		if($image != ''){
			$tempImage = json_decode($image);
			foreach ($tempImage as $key => $value) {
				if($value[1] == getImageDefault()){
					print_r($value);
					unset($tempImage[$key]);
				}
			}
			if($tempImage == ''){
				$tempImage = ['IMGS_OTHER_11223344', getImageDefault()];
			}
		} else {
			$tempImage = ['IMGS_OTHER_11223344', getImageDefault()];
		}

		$tempImage = array_values($tempImage);

		$cate = Items::findOrFail($id);

		$reponse = $cate->update([
			'name'   => $name,
			'subject'   => $subject,
			'parent' => $parent,
			'image' => $tempImage,
			'status' => 1,
			'detail' => $detail,
			'detail_short' => $detail_short,
			'title' => $title,
			'price' => str_replace(',', '', $price),
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

	function show($subject){
		$item = Items::where('status', 1)->where('subject', $subject)->first();
		$item->increment('view', 1);
		$listItems = Items::where('id','<>', $item->id)->where('parent', 'like', "%".explode(',', $item->parent)[0]."%")->take(10)->get();
		if(isset($item) > 0) {
			return view('frontend.page.item', compact('item', 'listItems'));
		} else {
			return view('error');
		}
	}
}