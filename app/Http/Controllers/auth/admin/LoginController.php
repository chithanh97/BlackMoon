<?php

namespace App\Http\Controllers\auth\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
	public function login(Request $request)
	{

		if ($request->getMethod() == 'GET') {
			return view('auth.admin.login');
		}

		$credentials = $request->only(['email', 'password']);
		if (Auth::guard('admin')->attempt($credentials)) {
			return redirect()->route('dashboard');
		} else {
			return redirect()->back()->withInput();
		}
	}

	public function logOut(){
		Auth::logout();
		return redirect('admin/login');
	}
}