<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

/**
 *
 */
class BackController extends Controller
{

	public function index(){
		return view('backend.page.dashboard');
	}

}
 ?>