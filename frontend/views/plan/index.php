<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/10/25
 * Time: 下午11:33
 */
use yii\helpers\Url;

$this->title = "留学规划";
?>
<div class="container">
	<h2 class="text-center m-t-30">留学规划</h2>
	<hr class="cont-tit-border" />
	<p class="color-gray line-height-18 text-indent">
		留洋帮智能留学方案系统将根据您提交的信息，结合大数据分析，为您量身打造一套留学指导方案，包括申请分析、选校指导、时间和关键节点规划三个部分，可以帮助申请者更加清晰、有针对性的准备留学申请，分为在线定制版和线下定制版两种。
	</p>
	<p class="color-gray m-t-20 text-indent">
		操作说明：
	</p>
	<p class="color-gray text-indent">
		第一步：填写信息，根据自己的真实情况填写相关信息；
	</p>
	<p class="color-gray text-indent">
		第二步：支付费用，留洋帮留学规划服务仅需 <big class="color-red">9.9元/次</big>，支持 <b class="color-black">微信</b> 和 <b class="color-black">支付宝</b> 扫码支付；
	</p>
	<p class="color-gray text-indent">
		第三步：查看方案，支付成功后查看您的留学规划方案。
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
		<div class="col-xs-3">
			<p class="gray-line"></p>
		</div>
		<div class="col-xs-2 text-center">
			<span class="blue-circle">
				2
			</span>
			<h4 class="color-blue">支付费用</h4>
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
	<div class="text-center m-t-50">
		<a href="<?= Url::to(['plan/meiben']); ?>" class="btn btn-blue btn-big-size btn-lg">我要规划</a>
	</div>
</div>