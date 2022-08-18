<?php

namespace App\Http\Controllers\auth\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class ProfileController extends Controller
{
	public function changePassword(){

		$login = Auth::guard('admin')->user();

		return view('auth.admin.changepassword', compact('login'));
	}

	public function saveChangePassword(Request $request){
		print_r($request->all());
	}
}