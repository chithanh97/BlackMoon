<?php

use Illuminate\Support\Facades\DB;

function vn_str_filter ($str){
	$unicode = array(
		'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
		'd'=>'đ',
		'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
		'i'=>'í|ì|ỉ|ĩ|ị',
		'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
		'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
		'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
		'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
		'D'=>'Đ',
		'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
		'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
		'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
		'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
		'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
	);

	foreach($unicode as $nonUnicode=>$uni){
		$str = preg_replace("/($uni)/i", $nonUnicode, $str);
	}

	return str_replace(' ','-',$str);
}

function checkSubject($subject, $table, $id = -1){
	$temp = DB::table($table)->where('subject', $subject)->get();
	return count($temp) == 0 ? false : true;
}

// function getMenuParent($array, $parent = -1, $not = -1, $select = -1, $str = '|--'){
// 	$reponse = '';
// 	foreach ($array as $key => $value) {
// 		if($parent == $value->parent && $value->id != $not){
// 				$selected = $select == $value->id ? 'selected' : '';
// 				$temp = '<option '.$selected.' value="'.$value->id.'">'.$str.' '.$value->name.'</option>';
// 				$reponse .= $temp;
// 				$reponse .= getMenuParent($array, $value->id, $not, $select, '|--'.$str);
// 		}
// 	}
// 	return $reponse;
// }
function getMenuParent($array, $parent = -1, $not = -1, $select = -1, $str = '|--'){
	$reponse = '';
	$selectx = explode(',', $select);
	foreach ($array as $key => $value) {
		if($parent == $value->parent && $value->id != $not){
			// $selected ='';
				$selected = array_search($value->id, $selectx) > -1 ? 'selected' : '';
				$temp = '<option '.$selected.' value="'.$value->id.'">'.$str.' '.$value->name.'</option>';
				$reponse .= $temp;
				$reponse .= getMenuParent($array, $value->id, $not, $select, '|--'.$str);
		}
	}
	return $reponse;
}
function getParentCate($arr, $parent){
	$res = 'Việt Nam';
	if($parent == 0) return $res;
	foreach ($arr as $key => $value) {
		if($value->id == $parent){
			$res = $value->name;
			return $res;
		}
	}
	return $res;
}
function getTypeBanner(){
	$res = [
		1 => "Banner trang chủ",
		2 => "Banner trang con"
	];
	return $res;
}

function getPositionMenu(){
	$res = [
		1 => "Menu main",
		2 => "Menu footer"
	];
	return $res;
}

function getVideo($string){
	$link_goc = 'https://www.youtube.com/embed/';
	$LK1 = explode("=", $string);
	$ls1 = $LK1[1];
	$LK2 = explode("&", $ls1);
	$ls2 = $link_goc . $LK2[0];
	return $ls2;
}

?>
