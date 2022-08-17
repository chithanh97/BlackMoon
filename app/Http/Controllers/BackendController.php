<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Items;
use App\Models\News;

/**
 *
 */
class BackendController extends Controller
{

	public function index(){
		$start = date('Y-m-01');
		$end = date('Y-m-t');
		$data = (object)[
			'order' => Order::where('created_at', '>', $start)->where('created_at', '<', $end)->count(),
			'total' => Order::where('created_at', '>', $start)->where('created_at', '<', $end)->sum('total'),
			'countItem' => Items::where('created_at', '>', $start)->where('created_at', '<', $end)->count(),
			'countNews' => News::where('created_at', '>', $start)->where('created_at', '<', $end)->count(),
			'countCOD' => Order::where('created_at', '>', $start)->where('created_at', '<', $end)->where('pay_method', 1)->sum('total'),
			'countMoMo' => Order::where('created_at', '>', $start)->where('created_at', '<', $end)->where('pay_method', 2)->sum('total'),
			'litsOrder' => Order::where('created_at', '>', $start)->where('created_at', '<', $end)->take(7),
		];
		return view('backend.page.dashboard', compact('data'));
	}

}
?>