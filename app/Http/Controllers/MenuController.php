<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Menuitem;
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

	public function addCatToMenu(Request $request){
		$data = $request->all();
		$menuid = $request->menuid;
		$ids = $request->ids;
		$menu = Menu::findOrFail($menuid);
		if($menu->content == ''){
			foreach($ids as $id){
				$data['title'] = Itemcategory::where('id',$id)->value('title');
				$data['slug'] = Itemcategory::where('id',$id)->value('slug');
				$data['type'] = 'category';
				$data['menu_id'] = $menuid;
				Menuitem::create($data);
			}
		}else{
			foreach($ids as $id){
				$olddata = json_decode($menu->content,true);
				$data['title'] = Itemcategory::where('id',$id)->value('title');
				$data['slug'] = Itemcategory::where('id',$id)->value('slug');
				$data['type'] = 'category';
				$data['menu_id'] = $menuid;
				$lastdata = Menuitem::create($data);
				$newdata = [];
				$newdata['id'] = $lastdata->id;
				$newdata['children'] = [[]];
				array_push($olddata[0],$newdata);
				$olddata = json_encode($olddata);
				$menu->update(['content'=>$olddata]);
			}
		}
	}

	public function addPostToMenu(Request $request){
		$data = $request->all();
		$menuid = $request->menuid;
		$ids = $request->ids;
		$menu = Menu::findOrFail($menuid);
		if($menu->content == ''){
			foreach($ids as $id){
				$data['title'] = News::where('id',$id)->value('title');
				$data['slug'] = News::where('id',$id)->value('slug');
				$data['type'] = 'post';
				$data['menu_id'] = $menuid;
				Menuitem::create($data);
			}
		}else{
			foreach($ids as $id){
				$olddata = json_decode($menu->content,true);
				$data['title'] = News::where('id',$id)->value('title');
				$data['slug'] = News::where('id',$id)->value('slug');
				$data['type'] = 'post';
				$data['menu_id'] = $menuid;
				$lastdata = Menuitem::create($data);
				$newdata = [];
				$newdata['id'] = $lastdata->id;
				$newdata['children'] = [[]];
				array_push($olddata[0],$newdata);
				$olddata = json_encode($olddata);
				$menu->update(['content'=>$olddata]);
			}
		}
	}

	public function addCustomLink(Request $request){
		$data = $request->all();
		$menuid = $request->menuid;
		$menu = Menu::findOrFail($menuid);
		if($menu->content == ''){
			$data['title'] = $request->link;
			$data['slug'] = $request->url;
			$data['type'] = 'custom';
			$data['menu_id'] = $menuid;
			Menuitem::create($data);
		}else{
			$olddata = json_decode($menu->content,true);
			$data['title'] = $request->link;
			$data['slug'] = $request->url;
			$data['type'] = 'custom';
			$data['menu_id'] = $menuid;
			Menuitem::create($data);
			$lastdata = Menuitem::orderby('id','DESC')->first();
			$array = [];
			$array['id'] = $lastdata->id;
			$array['children'] = [[]];
			array_push($olddata[0],$array);
			$olddata = json_encode($olddata);
			$menu->update(['content'=>$olddata]);
		}
	}
}