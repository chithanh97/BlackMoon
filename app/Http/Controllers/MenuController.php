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
		return view ('backend.page.menu.index',['itemcategory'=>Itemcategory::all(),'newscategory'=>Newscategory::all(),'news'=>News::all(),'menus'=>menu::all()]);
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
}