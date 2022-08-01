<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Slide;
use App\Models\Itemcategory;
use App\Models\Newscategory;
use App\Models\News;
use App\Models\Items;

class HomeController extends Controller
{
	public function index(){
		$user = Auth::guard('admin')->user();
	}

	public function home(){
		$slide = Slide::where('status', 1)->get();
		$itemCateHot = Itemcategory::where(['hot' => 1, 'status' => 1])->get();
		$newsCateHot = Newscategory::where(['hot' => 1, 'status' => 1])->get();
		$listItem = [];
		$listNews = [];
		foreach ($itemCateHot as $key => $value) {
			$listItem[$value['code']] = Items::where("status", 1)->where('parent', 'like', "%".$value->code."%")->take(3)->orderby('id','DESC')->get();
		}
		foreach ($newsCateHot as $key => $value) {
			$listNews[$value['code']] = News::where("status", 1)->where('parent', 'like', "%".$value->code."%")->take(3)->orderby('id','DESC')->get();
		}
		return view('frontend.page.home', compact('slide', 'itemCateHot', 'listItem', 'newsCateHot', 'listNews'));
	}
}

