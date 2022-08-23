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

	public function register(Request $request){
		$messages = [
			'name.required' => '- Họ tên không được để trống!',
			'email.required' => '- Email không được để trống!',
			'password.required' => '- Mật khẩu không được để trống!',
			'password.min' => '- Mật khẩu ít nhất phái có 6 ký tự!',
			're_password.required' => '- Mật khẩu nhập lại không được để trống!',
			're_password.same' => '- Mật khẩu nhập lại không đúng!',
		];

		$validator = $request->validate([
			'name'   => 'required',
			'email'   => 'required',
			'password'   => 'required|min:6',
			're_password'   => ['same:password'],
		], $messages);

		$checkMail = User::where('email', $request->email)->get();

		if(count($checkMail) > 0){

			return redirect()->back()->withInput()->withErrors(['register' => 'Email đã tốn tại!']);

		} else {
			$res = User::create([
				'name' => $request->name,
				'email' => $request->email,
				'password' => bcrypt($request->passwords),
			]);

			if($res){
				return redirect()->route('login')->withErrors(['login' => 'Đăng ký thành công!']);
			} else {
				return redirect()->back()->withInput()->withErrors('register', 'Đăng ký thất bại!');
			}

		}

	}
}