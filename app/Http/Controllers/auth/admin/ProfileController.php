<?php

namespace App\Http\Controllers\auth\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;
use Session;

class ProfileController extends Controller
{
	public function changePassword(){

		$login = Auth::guard('admin')->user();
		return view('auth.admin.changepassword', compact('login'));
	}

	public function saveChangePassword(Request $request){

		$messages = [
			'old_pass.required' => '- Mật khẩu không được để trống!',
			'new_pass.required' => '- Mật khẩu mới không được để trống!',
			'new_pass.min.string' => '- Mật khẩu ít nhất phái có 6 ký tự!',
			're_pass.required' => '- Mật khẩu nhập lại không được để trống!',
			're_pass.same' => '- Mật khẩu nhập lại không đúng!',
		];

		$validator = $request->validate([
			'old_pass'   => 'required',
			'new_pass'   => 'required|min:6',
			're_pass'   => ['same:new_pass'],
		], $messages);

		if(Hash::check($request->old_pass, Auth::guard('admin')->user()->password)){
			$kq = Admin::find(Auth::guard('admin')->user()->id)->update(['password'=> bcrypt($request->new_pass)]);
		} else {
			return redirect()->back()->withInput()->with('alert', 'Mật khẩu không đúng!');
		}

		if($kq){
			return redirect()->route('admin.changepass')->with('alert', 'Đổi mật khẩu thành công!');
		} else {
			return redirect()->back()->withInput()->with('alert', 'Đổi mật khẩu thất bại!');
		}
	}
}