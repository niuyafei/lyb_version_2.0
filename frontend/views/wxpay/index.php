<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/11/8
 * Time: 下午11:30
 */

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>微信支付二维码</title>
	<link rel="stylesheet" type="text/css" href="/css/wechat_pay.css"/>
</head>

<body style="background-color: rgb(51, 51, 51); padding: 50px;">
<div class="main impowerBox">
	<div class="loginPanel normalPanel">
		<div class="title">微信扫描支付</div>
		<div class="waiting panelContent">
			<div class="wrp_code"><img class="qrcode lightBorder" src="http://paysdk.weixin.qq.com/example/qrcode.php?data=<?= urlencode($url);?>"></div>
			<div class="info">
				<div class="status status_browser js_status normal">
					<p>请使用微信扫描二维码登录</p>
					<p>“留洋帮申校助手”</p>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

</html>