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
		$desiredMenu = '';
		$menuitems = '';
		if(isset($_GET['id']) && $_GET['id'] != 'new'){
			$id = $_GET['id'];
			$desiredMenu = Menu::where('id',$id)->first();
			if($desiredMenu->content != ''){
				$menuitems = json_decode($desiredMenu->content);
			}else{
				$menuitems = Menuitem::where('menu_id',$desiredMenu->id)->get();
			}
		}else{
			$desiredMenu = Menu::orderby('id','DESC')->first();
			if($desiredMenu){
				if($desiredMenu->content != ''){
					$menuitems = json_decode($desiredMenu->content);
				}else{
					$menuitems = Menuitem::where('menu_id',$desiredMenu->id)->get();
				}
			}
		}
		return view ('backend.page.menu.index',['itemcategory'=>Itemcategory::all(),'newscategory'=>Newscategory::all(),'news'=>News::all(),'menus'=>Menu::all(), 'desiredMenu'=>$desiredMenu]);
	}

	public function store(Request $request)
	{
		$data = $request->all();
		if(Menu::create($data)){
			$newdata = Menu::orderby('id','DESC')->first();
			session::flash('success','Menu saved successfully !');
			return redirect("manage-menus?id=$newdata->id");
		}else{
			return redirect()->back()->with('error','Failed to save menu !');
		}
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