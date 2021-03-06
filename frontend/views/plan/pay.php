<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/10/26
 * Time: 上午1:28
 */
use yii\helpers\Url;

$this->title = "留学规划";
?>

<div class="container">
	<h2 class="text-center m-t-30">留学规划</h2>
	<hr class="cont-tit-border" />
	<div class="row step-style">
		<div class="col-xs-2 text-center">
			<span class="gray-circle">
				1
			</span>
			<h4 class="color-gray">填写信息</h4>
		</div>
		<div class="col-xs-3">
			<p class="gray-line"></p>
		</div>
		<div class="col-xs-2 text-center">
			<span class="red-circle">
				2
			</span>
			<h4 class="color-red">支付费用</h4>
		</div>
		<div class="col-xs-3">
			<p class="gray-line"></p>
		</div>
		<div class="col-xs-2 text-center">
			<span class="blue-circle">
				3
			</span>
			<h4 class="color-blue">查看方案</h4>
		</div>
	</div>
	<div class="border-color p-20 m-t-50 p-b-0 p-t-40 p-b-10">
		<div class="row m-b-20">
			<div class="col-xs-2 color-gray text-right">
				订单金额
			</div>
			<div class="col-xs-10 color-red">
				<h3 class="m-0">9.9元</h3>
			</div>
		</div>
		<div class="row m-b-20">
			<div class="col-xs-2 color-gray text-right">
				订单号
			</div>
			<div class="col-xs-10">
				<?= "lyb" . time().rand(10000,99999); ?>
			</div>
		</div>
		<div class="row m-b-20">
			<div class="col-xs-2 color-gray text-right">
				支付方式
			</div>
			<div class="col-xs-10">
				<form action="" method="post">
					<div class="row">
						<div class="col-xs-2 p-r-0">
							<img src="<?= Url::to("/img/wechat_icon.jpg"); ?>" width="50" />
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" value="wxpay" checked>
									微信
								</label>
							</div>
						</div>
						<div class="col-xs-2 p-l-0">
							<img src="<?= Url::to("/img/alipay_icon.jpg"); ?>" width="50" />
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" value="alipay">
									支付宝
								</label>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="text-center m-t-50">
		<button id="payment" class="btn btn-blue btn-big-size btn-lg">点击支付</button>
<!--		<a href="plan_view.html" class="btn btn-blue btn-big-size btn-lg">点击支付</a>-->
	</div>
</div>
<?php
$js = <<<JS
	var domain = document.domain;
	var url = "http://" + domain;
	$("#payment").click(function(){
		var payType = $("input[name='optionsRadios']:checked").val();
		//'subject', 'amount', 'body', 'case_id', 'payment'
		var subject = "留学规划";
		var amount = "9.9";
		var body = "";
		var payment = "5";
		if(payType == "alipay"){
			//支付宝
			window.location.href = url + "/alipay/index?subject=" + subject + "&amount=" + amount + "&body=" + body + "&payment=" + payment;
		}else if(payType == "wxpay"){
			//微信
			window.location.href = "http://" + domain + "/wxpay/index?subject=" +subject + "&amount=" + amount + "&body=" + body + "&payment=" + payment;
		}
	});
JS;

$this->registerJs($js);
?>