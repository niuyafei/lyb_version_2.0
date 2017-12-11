<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/11/23
 * Time: 上午1:42
 */
?>
<!doctype html>
<html lang="zh-CN">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

	<title>申校系统</title>

	<!-- Bootstrap core CSS -->
	<link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/css/style.css" />
	<!--[if lt IE 9]><script src="/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	<script src="/bootstrap/js/ie-emulation-modes-warning.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
<div class="site-wrapper">
	<div class="site-wrapper-inner">
		<div class="container">
			<div class="index-main-body">
				<h1 class="logo hide-text">留洋帮</h1>
				<h4 class="logo-slogn">成 就 人 生 远 航 梦 想</h4>
				<h5 class="text-center color-blue">申校系统 1.0</h5>
				<div class="p-10 m-t-20">
					<div role="tabpanel" class="tab-pane fade in active" id="login">
						<form class="form-signin">
							<div class="form-boxline">
								<label for="inputEmail" class="sr-only">手机号</label>
								<input type="email" id="inputEmail" class="form-control" placeholder="手机号" required="" autofocus="">
								<hr class="form-middleline" />
								<label for="inputEmail" class="sr-only">手机验证码</label>
								<input type="email" id="inputEmail" class="form-control" placeholder="手机验证码" required="" autofocus="">
								<input type="button" id="yanzhengma" value="获取验证码" class="btn btn-sm btn-outline yanzhengma-position" onclick="javascript:send();" style="top: 65px;">
								<hr class="form-middleline" />
								<label for="inputCode" class="sr-only">图形验证码</label>
								<input type="text" id="inputCode" class="form-control" placeholder="图形验证码" required="" autofocus="">
								<img src="/site/verify-code" id="verifyCode" class="img-yanzhengma" />
								<hr class="form-middleline" />
								<label for="inputPassword" class="sr-only">新密码</label>
								<input type="password" id="inputPassword" class="form-control" placeholder="新密码" required="">
							</div>
							<button class="btn btn-lg btn-primary btn-block m-t-20" type="submit">提交</button>
						</form>

						<div class="p-t-10 color-ad">
							<a class="signup" href="login.html">立即登录</a>
						</div>
					</div>

				</div>
				<div class="mastfoot">
					<div class="inner color-ad text-center">
						<p>Copyright © 北京联校传奇信息科技有限公司</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<link rel="stylesheet" type="text/css" href="/css/login.css" />
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/bootstrap/js/jquery-2.1.3.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/bootstrap/js/ie10-viewport-bug-workaround.js"></script>
<script src="/bootstrap/js/yanzhengma.js"></script>
<style type="text/css">
	.btn-primary {
		color: #ffffff;
		background-color: #03a1e9;
		border-color: transparent;
	}

	.btn-primary:focus,
	.btn-primary:hover {
		color: #ffffff;
		background-color: #03a1e9;
		border-color: transparent;
	}

	.p-t-10 {
		padding-top: 10px;
	}

	.m-t-20 {
		margin-top: 20px;
	}

	.btn-sm,
	.btn-group-sm>.btn {
		padding: 2px 5px;
	}

	.btn-outline,
	.btn-outline:hover,
	.btn-outline:focus,
	.btn-outline:active {
		border-color: #03a1e9;
		color: #03a1e9;
		background-color: #FFFFFF;
		outline: 0;
	}

	.yanzhengma-position {
		position: absolute;
		right: 10px;
		top: 10px;
	}
</style>
</body>
<script>
	$("#verifyCode").click(function(){
		$(this).attr("src", "/site/verify-code?num="+Math.random());
	});
</script>
</html>