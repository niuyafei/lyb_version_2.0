<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/10/28
 * Time: 上午2:19
 */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = "预约咨询";
?>
<div class="container">
	<h2 class="text-center m-t-30">预约咨询</h2>
	<hr class="cont-tit-border" />
	<div class="row step-style">
		<div class="col-xs-2 text-center">
			<span class="gray-circle">
				1
			</span>
			<h4 class="color-gray">填写信息</h4>
		</div>
		<div class="col-xs-1">
			<p class="gray-line"></p>
		</div>
		<div class="col-xs-2 text-center">
			<span class="red-circle">
				2
			</span>
			<h4 class="color-red">支付费用</h4>
		</div>
		<div class="col-xs-1">
			<p class="gray-line"></p>
		</div>
		<div class="col-xs-2 text-center">
			<span class="blue-circle">
				3
			</span>
			<h4 class="color-blue">专家答疑</h4>
		</div>
		<div class="col-xs-1">
			<p class="gray-line"></p>
		</div>
		<div class="col-xs-2 text-center">
			<span class="blue-circle">
				4
			</span>
			<h4 class="color-blue">评价建议</h4>
		</div>
	</div>
	<div class="border-color p-20 m-t-50 p-b-0 p-t-40 p-b-10">
		<div class="row m-b-20">
			<div class="col-xs-2 text-right">
				<b>订单金额</b>
			</div>
			<div class="col-xs-10 color-red">
				<h3 class="m-0">99元</h3>
			</div>
		</div>
		<div class="row m-b-20">
			<div class="col-xs-2 text-right">
				<b>订单号</b>
			</div>
			<div class="col-xs-10">
				<?= 'lyb' . time() . rand(10000, 99999); ?>
			</div>
		</div>
		<div class="row m-b-20">
			<div class="col-xs-2 text-right">
				<b>支付方式</b>
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
	</div>
</div>
<?php
$js = <<<JS
	var domain = document.domain;
	var url = "http://" + domain;
	$("#payment").click(function(){
		var payType = $("input[name='optionsRadios']:checked").val();
		//'subject', 'amount', 'body', 'case_id', 'payment'
		var subject = "预约咨询";
		var amount = "99";
		var body = "";
		var payment = "4";
		var consultation_id = $consultation_id;
		if(payType == "alipay"){
			//支付宝
			window.location.href = url + "/alipay/index?subject=" + subject + "&amount=" + amount + "&body=" + body + "&payment=" + payment + "&consultation_id=" + consultation_id;
		}else if(payType == "wxpay"){
			//微信
			window.location.href = "http://" + domain + "/wxpay/index?subject=" +subject + "&amount=" + amount + "&body=" + body + "&payment=" + payment + "&consultation_id=" + consultation_id;
		}
	});
JS;

$this->registerJs($js);
?>