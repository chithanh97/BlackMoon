<?php

namespace App\Http\Controllers\auth\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Passreset;

class ForgotPasswordController extends Controller
{
	public function index(){
		return view('auth.user.forgotpass');
	}

	public function forgotPass(Request $request){
		$checkEmail = User::where('email', $request->email)->get();
		if(count($checkEmail) > 0) {

			$checkReset = Passreset::where('email', $request->email)->get();
			if(count($checkReset) > 0) {
				Passreset::where('email', $checkReset[0]->email)->delete();
			}

			Passreset::create([
				'email' => $request->email,
				'token' => $this->generateRandomString(36)
			]);
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
}