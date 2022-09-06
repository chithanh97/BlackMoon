<?php

namespace App\Http\Controllers\auth\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Passreset;
use Mail;

class ForgotPasswordController extends Controller
{
	public function index(){
		return view('auth.user.forgotpass');
	}

	public function forgotPass(Request $request){
		$checkEmail = User::where('email', $request->email)->get();
		$email = $request->email;

		if(count($checkEmail) > 0) {

			$checkReset = Passreset::where('email', $request->email)->get();

			if(count($checkReset) > 0) {
				$dateNow = strtotime(date('Y-m-d H:i:s'));
				$dateOld = strtotime($checkReset[0]->created_at);
				$temp = round(abs($dateNow - $dateOld) / 60,2);
				if($temp >= 3) {
					Passreset::where('email', $checkReset[0]->email)->delete();
				} else {
					return redirect()->back()->withInput()->with(['alert' => 'Mật khẩu đang được khôi phục. Thử lại sau 3 phút!']);
				}
			}

			$resetItem = Passreset::create([
				'email' => $email,
				'token' => $this->generateRandomString(36)
			]);

			$temp = Mail::send('frontend.mailforgotpass', array(
				'token' => $resetItem->token
			), function($message) use ($request){

				$message->from('ncthanh@vsetgroup.com', 'Khôi phục mật khẩu');
				$message->to($request->email, 'Khôi phục mật khẩu')->subject('Khôi phục mật khẩu');

			});

			if($temp) {
				return redirect()->back()->with(['alert' => 'Link đổi mật khẩu đã được gửi vào email '.$request->email.'. Truy cập email để đổi mật khẩu!']);
			} else {
				return redirect()->back()->with(['alert' => 'Lỗi gửi email khôi phục!']);
			}

		} else {
			return redirect()->back()->with(['alert' => 'Email không tồn tại!']);
		}
	}

	function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	function restorePass($token){
		return view('auth.user.restorepass', compact('token'));
	}

	function saveRestorePass(Request $request){
		$messages = [
			'new_pass.required' => '- Mật khẩu mới không được để trống!',
			'new_pass.min' => '- Mật khẩu ít nhất phái có 6 ký tự!',
			're_pass.required' => '- Mật khẩu nhập lại không được để trống!',
			're_pass.same' => '- Mật khẩu nhập lại không đúng!',
		];

		$validator = $request->validate([
			'new_pass'   => 'required|min:6',
			're_pass'   => ['same:new_pass'],
		], $messages);

		$resetItem = Passreset::where('token', $request->token)->orderby('id', 'desc')->first();

		$dateNow = strtotime(date('Y-m-d H:i:s'));
		$dateOld = strtotime($resetItem->created_at);
		$temp = round(abs($dateNow - $dateOld) / 3600,2);
		if($temp < 24) {
			$kq = User::where('email', $resetItem->email)->update(['password'=> bcrypt($request->new_pass)]);

			if($kq){
				Passreset::where('token', $request->token)->delete();
				return redirect()->route('login')->with('alert', 'Khôi phục mật khẩu thành công!');
			} else {
				return redirect()->back()->withInput()->with('alert', 'Khôi phục mật khẩu thất bại!');
			}
		} else {
			return redirect()->back()->withInput()->with('alert', 'Quá thời gian khôi phục mật khẩu!');
		}
	}

}