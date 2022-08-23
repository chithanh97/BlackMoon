<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
	public function index()
	{
		echo 'ffffffff';
	}

	public function getSubject(Request $request){
		$id = $request->input('id') == '' ? -1 : $request->input('id');
		$value = $request->input('value');
		$table = $request->input('table');

		if(!checkSubject(vn_str_filter($value), $table, $id)) {
			return vn_str_filter($value);
		} else {
			$temp = $value;
			for($i = 1; $i <= 1000000; $i++){
				if(!checkSubject(vn_str_filter($value.$i), $table, $id)){
					return $temp = $value.'-'.$i;
				}
			}
			return $temp;
		}
	}

	public function changeStatus(Request $request){
		$field = $request->field;
		$table = $request->table;
		$id = $request->id;

		if($field != '' && $table != '' && $id != ''){
			$temp = 'IF('.$field.' = 1, 0, 1)';
			$res = DB::statement('update '.$table.' set '.$field.' = IF('.$field.'=1, 0, 1) where id ='.$id);
			if($res){
				return 'ok';
			}
			return 'update '.$table.' set '.$field.' = IF('.$field.'=1, 0, 1) where id ='.$id;
		}
	}
}

