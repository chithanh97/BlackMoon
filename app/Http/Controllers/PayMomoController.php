<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Items;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\Order;
use App\Models\Orderitem;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

use Cart;
use Session;

class PayMomoController extends Controller
{

	public static function payMoMo($order){
		$endPoint = "https://test-payment.momo.vn/v2/gateway/api/create";

		$partnerCode = 'MOMONHN020220830';
		$accessKey = 'vqJdySw0ZVLh20oU';
		$secretKey = 'FgXn8FQAYN5Iyx6lQKsLRwDsuKQm9e7o';
		$orderInfo = "Thanh toán qua MoMo";
		$amount = $order->total;
		$orderId = $order->order_code;
		$redirectUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
		$ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
		$extraData = "";

		$requestId = $order->order_code;
		$requestType = "captureWallet";

		$rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
		$signature = hash_hmac("sha256", $rawHash, $secretKey);

		$data = array(
			'partnerCode' => $partnerCode,
			'partnerName' => "Test",
			"storeId" => "MomoTestStore",
			'requestId' => $requestId,
			'amount' => $amount,
			'orderId' => $orderId,
			'orderInfo' => $orderInfo,
			'redirectUrl' => $redirectUrl,
			'ipnUrl' => $ipnUrl,
			'lang' => 'vi',
			'extraData' => $extraData,
			'requestType' => $requestType,
			'signature' => $signature
		);

		$result = PayMomoController::execPostRequest($endPoint, json_encode($data));
		$jsonResult = json_decode($result, true);
		return redirect()->to($jsonResult['payUrl'])->send();
	}

	public static function execPostRequest($url, $data) {
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data))
	);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}
}