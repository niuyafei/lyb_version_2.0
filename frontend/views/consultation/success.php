<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/11/10
 * Time: 上午12:52
 */

use yii\helpers\Url;

$this->title = "预约咨询";
?>
<div class="container">
	<h2 class="text-center m-t-30"><?= $this->title; ?></h2>
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
			<span class="gray-circle">
				2
			</span>
			<h4 class="color-gray">支付费用</h4>
		</div>
		<div class="col-xs-1">
			<p class="gray-line"></p>
		</div>
		<div class="col-xs-2 text-center">
			<span class="red-circle">
				3
			</span>
			<h4 class="color-red">专家答疑</h4>
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
	<div class="border-color p-20 m-t-50 p-t-40 p-b-10">
		<div class="text-center">
			<img src="/img/success.png" width="100" />
			<h4 class="color-green m-t-15">恭喜您，预约成功！</h4>
		</div>
		<p class="p-l-35 p-r-35 m-t-30">
			恭喜您预约成功，系统会在24小时内为您安排留学专家与您通话，咨询开始前半小时发送提醒信息。请您保持通话畅通，谢谢。有问题，欢迎拨打留洋帮客服热线 <span class="color-blue">400-610-0025</span> 与我们取得联系。
		</p>
	</div>
	<div class="text-center m-t-50">
		<a href="<?= Url::to(['site/index']); ?>" class="btn btn-blue btn-big-size btn-lg">返回首页</a>
	</div>
</div>