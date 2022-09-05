<?php

namespace App\Http\Controllers\auth\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class LoginController extends Controller
{
	public function login(Request $request)
	{
		if ($request->getMethod() == 'GET') {
			return view('auth.user.login');
		}

		$messages = [
			'l_email.required' => '- Email không được để trống!',
			'l_password.required' => '- Mật khẩu không được để trống!',
		];

		$validator = $request->validate([
			'l_email'   => 'required',
			'l_password'   => 'required',
		], $messages);

		if (Auth::attempt(['email' => $request->l_email, 'password' => $request->l_password])) {
			return redirect()->route('home');
		} else {
			return redirect()->back()->withInput()->withErrors(['login' => 'Email hoặc mật khẩu không chính xác!']);
		}
	}

	function logout(){
		Auth::logout();
		return redirect()->route('home');
	}
}