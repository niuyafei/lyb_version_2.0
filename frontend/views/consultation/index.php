<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/10/28
 * Time: 上午12:54
 */
use yii\helpers\Url;

$this->title = "预约咨询";
?>
<div class="container">
	<h2 class="text-center m-t-30">预约咨询</h2>
	<hr class="cont-tit-border" />
	<p class="color-gray line-height-18 text-indent">
		针对您更个性的问题，比如选校定位、专业定位、就业定位、背景提升或者时间规划，我们的值班专家进行一对一的针对性沟通和指导。您需要在线上填写相关预约信息，完成支付后，即为预约成功。系统会在24小时内为您确定专家人选，按照约定时间和内容为你提供咨询指导服务。
	</p>
	<p class="color-gray text-indent">
		相关说明：
	</p>
	<p class="color-gray text-indent">

		- 预约时间为 9:00—21:00，每半小时为一个单位，每次只能预约1个时间段，只可以预约24小时之后的时间段；
	</p>
	<p class="color-gray text-indent">
		- 预约费用为：<big class="color-red">99元/次</big>，支持 <b class="color-black">微信</b> 和 <b class="color-black">支付宝</b> 扫码支付；
	</p>
	<p class="color-gray text-indent">
		- 咨询服务结束之后请您在网站上进行点评并提出相关建议，您将有机会获得 <b class="color-black">精美礼品</b> 一份。
	</p>
	<p class="color-gray m-t-20 text-indent">
		如需帮助，请拨打留洋帮客服热线 <span class="color-red">400 610 0025</span> 与我们联系。
	</p>
	<div class="row step-style">
		<div class="col-xs-2 text-center">
			<span class="blue-circle">
				1
			</span>
			<h4 class="color-blue">填写信息</h4>
		</div>
		<div class="col-xs-1">
			<p class="gray-line"></p>
		</div>
		<div class="col-xs-2 text-center">
			<span class="blue-circle">
				2
			</span>
			<h4 class="color-blue">支付费用</h4>
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
	<div class="text-center m-t-50">
		<a href="<?= Url::to(['consultation/myconsultation']); ?>" class="btn btn-blue btn-big-size btn-lg">我要咨询</a>
	</div>
</div>