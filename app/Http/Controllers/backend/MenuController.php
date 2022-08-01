<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Menuitems;
use App\Models\Itemcategory;
use App\Models\Newscategory;
use App\Models\News;
use Session;

class MenuController extends Controller
{
	public function index(){
		$list = Menu::orderby('id','DESC')->paginate(10)->withQueryString();
		return view('backend.page.menu.index', compact('list'));
	}

	public function store(Request $request)
	{
		$list = Menu::paginate(10)->withQueryString();
		return view('backend.page.menu.index', compact('list'));
	}

	public function edit($id){
		$item = Menu::findOrFail($id);
		$itemcategory = Itemcategory::where('status', 1)->get();
		$newscategory = Newscategory::where('status', 1)->get();
		$listitem = Menuitems::where('menu_id', $id)->get();
		return view('backend.page.menu.edit', compact('item', 'itemcategory', 'newscategory', 'listitem'));
	}

	public function create(Request $request){
		$messages = [
			'name.required' => '- Tên không được để trống!',
		];

		$validator = $request->validate([
			'name'   => 'required',
		], $messages);

		$name = $request->name;
		$location = $request->location;

		$reponse = Menu::create([
			'name'  => $name,
			'status' => 1,
			'location' => $location,
			'lang' => 1
		]);

		if($reponse){
			return redirect()->route('menu')->with('alert', '- Thêm thành công!');
		}
		return redirect()->back()->withInput();
	}

	public function delete($id){
		$res = Menu::find($id)->delete();
		return redirect()->route('menu')->with('alert', '- Xóa thành công!');
	}

	public function update($id, Request $request){

		$messages = [
			'name.required' => '- Tên không được để trống!',
		];

		$validator = $request->validate([
			'name'   => 'required',
		], $messages);

		$name = $request->name;
		$location = $request->location;
		$content = $request->content;

		$cate = Menu::findOrFail($id);

		$reponse = $cate->update([
			'name' => $name,
			'location' => $location,
			'content' => $content,
		]);

		if($reponse){
			return redirect()->route('menu')->with('alert', '- Sửa thành công!');
		} else {
			return redirect()->back()->withInput();
		}
	}

	function addMenuItems(Request $request){

		$target = $request->target;
		$menu_id = $request->menu_id;

		if($target == '' || $menu_id == ''){
			echo json_encode(['code' => 2, 'message' => "Lỗi thông tin"]);
		} else {
			$reponse = Menuitems::create([
				'type' => 1,
				'target' => $target,
				'menu_id' => $menu_id,
			]);
			$cate = Itemcategory::findOrFail($target);
			echo json_encode(['code' => 1, 'message' => "Thêm thành công", 'id' => $reponse->id, 'name' => $cate->name]);
		}
	}

	function addMenuNews(Request $request){

		$target = $request->target;
		$menu_id = $request->menu_id;

		if($target == '' || $menu_id == ''){
			echo json_encode(['code' => 2, 'message' => "Lỗi thông tin"]);
		} else {
			$reponse = Menuitems::create([
				'type' => 2,
				'target' => $target,
				'menu_id' => $menu_id,
			]);
			$cate = Newscategory::findOrFail($target);
			echo json_encode(['code' => 1, 'message' => "Thêm thành công", 'id' => $reponse->id, 'name' => $cate->name]);
		}
	}

	function addMenuLink(Request $request){

		$menu_id = $request->menu_id;
		$link = $request->link;
		$linktext = $request->linktext;

		if($menu_id == '' || $linktext == '' || $link == ''){
			echo json_encode(['code' => 2, 'message' => "Lỗi thông tin"]);
		} else {
			$reponse = Menuitems::create([
				'type' => 3,
				'name' => $linktext,
				'menu_id' => $menu_id,
				'target' => 3,
				'slug' => $link
			]);
			echo json_encode(['code' => 1, 'message' => "Thêm thành công", 'id' => $reponse->id, 'name' => $linktext, 'slug' => $link]);
		}
	}

	function deleteMenuItem(Request $request){
		$id = $request->id;
		$res = Menuitems::find($id)->delete();
		if(!$res){
			echo json_encode(['code' => 2, 'message' => "Lỗi thông tin"]);
		} else {
			echo json_encode(['code' => 1, 'message' => "Xóa thành công"]);
		}
	}
}