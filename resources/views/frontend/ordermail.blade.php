<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="color-scheme" content="light dark">
	<meta name="supported-color-schemes" content="light dark">
	<style>
		:root {
			color-scheme: light dark;
			supported-color-schemes: light dark;
			--white: white;
			--black: black;
			--gray: #fafafa;
		}

		@media (prefers-color-scheme: dark ) {
			:root {
				--white: #ccc!important;
				--black: #fff!important;
				--gray: #fafafa;
			}
		}
	</style>
</head>
<body style="background:  var(--white);">
	<table class="light-mode" style="min-width:100%;width:100%;max-width:100%;font-family:verdana;font-size:12px;color:#555555!important;line-height:15pt;margin:auto; border: 1px solid #fff">
		<tbody>
			<tr>
				<td style="width:100%">
					<table style="min-width:600px;width:90%;max-width:1000px;margin:auto;">
						<tbody>
							<tr>
								<td>
									<table style="width:100%;padding:5% 10% 0;background-repeat:no-repeat;background-size:cover;">
										<tbody>
											<tr style="padding:20px;">
												<td>
													<img class="ttt" src="{{ $s->logo }}" style="width:12%;max-width:110px;min-width: 100px">
												</td>
											</tr>
											<tr>
												<td>
													<p style="margin-top:0px;border-bottom:1px solid #ededed!important"></p>
												</td>
											</tr>
										</tbody>
									</table>
									<table style="width:100%;padding:0 10% 0;background-repeat:repeat-y;background-size:contain;font-family:verdana;font-size:12px;color:#555555!important;">
										<tbody>
											<tr>
												<td>
													<p style="padding:15px 0px;font-size:30px;text-align:left;margin:0;color:  var(--black)!important">Cảm ơn bạn!</p>
												</td>
											</tr>
											<tr>
												<td>
													<p style="padding:15px 0px;font-size:25px;text-align:left;margin:0;color:  var(--black)!important"><?=$name?></p>
												</td>
											</tr>
											<tr>
												<td style="color:  var(--black)!important">
													Đơn hàng của bạn tại <a href="https://thoitrangvsman.vn" style="color:  var(--black)!important"><strong>{{ $s->domain }}</strong></a> đang được chúng tôi xử lý.
												</td>
											</tr>
											<tr><td><br></td></tr>
											<tr>
												<td>
													<p style="margin:0;color:  var(--black)!important"><strong>Số đơn hàng: </strong> {{  }}</p>
												</td>
											</tr>
											<tr>
												<td>
													<!-- <p style="margin:0;"><strong>Ngày đặt hàng: </strong> <?//=date("d-m-Y \l\ú\c H:i")?></p> -->
													<p style="margin:0;color:  var(--black)!important"><strong>Ngày đặt hàng: </strong>
														<?php $dt = strtotime($t['ThoiDiemDatHang']);
														echo date('H:i:s d-m-Y', $dt)?>
													</p>
												</td>
											</tr>
											<tr><td><br></td></tr>
										</tbody>
									</table>
									<table style="width:100%;padding:0 10% 0;background-repeat:repeat-y;background-size:contain;font-family:verdana;font-size:12px;color: var(--black);line-height:1.5">
										<thead>
											<tr>
												<td><strong style="color:  var(--black)!important">Hình ảnh</strong></td>
												<td><strong style="color:  var(--black)!important">Mặt hàng</strong></td>
												<td><strong style="color:  var(--black)!important">Số lượng</strong></td>
												<td style="text-align:right;"><strong>Đơn giá VNĐ</strong></td>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><p style="margin-top:5px;border-bottom:1px solid #ededed!important"></p></td>
												<td><p style="margin-top:5px;border-bottom:1px solid #ededed!important"></p></td>
												<td><p style="margin-top:5px;border-bottom:1px solid #ededed!important"></p></td>
											</tr>
											<?php
											foreach ($cart as $id => $it) { ?>
												<tr>
													<td>
														<?php if($it['size'] != '' && $it['color'] != ''){
															$cl = $it['color'] ?>
															<img width="100%" style="max-width: 100px; min-width: 100px" src="https://thoitrangvsman.vn<?=json_decode($it['sub_image'], true)['sub'][$cl][0]?>" alt="">
														<?php }else{ ?>
															<img width="100%" style="max-width: 100px; min-width: 100px" src="https://thoitrangvsman.vn<?=$it['url_image']?>" alt="<?=$it['name']?>">
														<?php } ?>
													</td>
													<td style="text-align:left;font-size:12px;padding-right:10px">
														<a style="color:  var(--black)!important" href="https://thoitrangvsman.vn/<?=$it['link']?>"><?=$it['name']?></a>
														<?php if($it['size'] != '' && $it['color'] != ''){ ?>
															<p><?=$it['color']?>/<?=$it['size']?></p>
														<?php } ?>
													</td>
													<td style="text-align:left;font-size:12px;padding-right:10px"><?=$it['tongsl']?></td>
													<td style="text-align:right;font-size:12px"><?=$it['price']?></td>
												</tr>
												<?php
											}?>
											<tr>
												<td><p style="margin-top:5px;border-bottom:1px solid #ededed!important"></p></td>
												<td><p style="margin-top:5px;border-bottom:1px solid #ededed!important"></p></td>
												<td><p style="margin-top:5px;border-bottom:1px solid #ededed!important"></p></td>
											</tr>
										</tbody>
									</table>
									<table style="width:100%;padding:0 10% 0;background-repeat:repeat-y;background-size:contain;font-family:verdana;font-size:12px;color: var(--black);line-height:25px">
										<tbody>
											<tr>
												<td style="text-align:right;font-size:12px" colspan="2" width="150">
													<strong style="color:  var(--black)!important">Phí vận chuyển:</strong> <?=$ship?>
												</td>
											</tr>
											<tr>
												<td style="text-align:right;font-size:12px" colspan="2" width="150">
													<strong style="color:  var(--black)!important">Tổng cộng:</strong> <?=(int)($sump+$ship)?>
												</td>
											</tr>
											<tr>
												<td><p style="margin-top:5px;border-bottom:1px solid #ededed!important"></p></td>
											</tr>
										</tbody>
									</table>
									<table style="width:100%;padding:0 10% 0;background-repeat:repeat-y;background-size:contain;font-family:verdana;font-size:12px;color: var(--black);line-height:25px">
										<tbody>
											<tr>
												<td style="text-align:left;font-size:12px" colspan="2" width="150">
													<strong style="color:  var(--black)!important">Phương thức Thanh toán:</strong>
												</td>
												<td style="text-align:right;font-size:12px" colspan="2" width="150">
													<?=($onl=='1')?"Online":"Khi nhận hàng"?>
												</td>
											</tr>
											<?php if($onl=='1'){ ?>
												<tr>
													<td style="text-align:left;font-size:12px" colspan="2" width="150">
														<strong style="color:  var(--black)!important">Thông tin Thanh toán:</strong>
													</td>
													<td style="text-align:right;font-size:12px" colspan="2" width="150">
														<strong style="color:  var(--black)!important">555000777888</strong> - <big style="color:  var(--black)!important">NH TMCP A CHAU - PHAN HUY ICH</big>
													</td>
												</tr>
												<?php
											}?>

											<tr><td></td></tr>
										</tbody>
									</table>
									<table style="width:100%;padding:0 10% 0;background-repeat:repeat-y;background-size:contain;font-family:verdana;font-size:12px;color:#555555!important;line-height:25px">
										<tbody>
											<tr>
												<td><p style="margin-top:5px;border-bottom:1px solid #ededed!important"></p></td>
											</tr>
											<tr>
												<td style="color:  var(--black)!important">
													Mọi chi tiết xin vui lòng liên hệ Hotline CSKH: <?=$s['hotline']?>
												</td>
											</tr>
											<tr>
												<td>
													<strong style="color:  var(--black)!important">Vui lòng không trả lời thư này.</strong>
												</td>
											</tr>
											<tr>
												<td style="color:  var(--black)!important">
													<br>
													© 2020 THOITRANGVSMAN | VSETGROUP
													<br><br>
													<?=$s['name']?>
													<br>
													Address: <?=$s['address']?>
													<br>
													MST: <?=$s['mst']?> - Hotline: <?=$s['hotline']?>
												</td>
											</tr>
										</tbody>
									</table>
									<table style="width:100%;padding:0 10% 0;background-repeat:no-repeat;background-size:cover;font-family:verdana;font-size:12px;color: var(--black);line-height:25px">
										<tbody>
											<tr><td><br></td></tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>