<?php

namespace App\Http\Controllers;

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
		$data = [];
		return view('backend.page.menu.edit', compact('item', 'itemcategory', 'newscategory', 'data'));
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

	function deleteMenuItem(Request $request){

	}
}