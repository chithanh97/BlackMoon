<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Slide;

class HomeController extends Controller
{
	public function index(){
		$user = Auth::guard('admin')->user();
	}

	public function home(){
		$slide = Slide::where('status', 1)->get();
		return view('frontend.page.home', compact('slide'));
	}
}

