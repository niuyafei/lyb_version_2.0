<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/10/24
 * Time: 下午10:05
 */
use common\models\AbordCase;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->title = "案例详情";
?>
<div class="container">
	<h2 class="text-center m-t-30">留学案例</h2>
	<hr class="cont-tit-border" />
	<div class="border-color p-20 m-t-50">
		<div class="case-info">
			<div class="row case-info-detail">
				<h3 class="text-center m-t-10">学生信息</h3>
				<hr class="cont-tit-border-sm">
				<div class="col-xs-6 case-info-left">
					<ul class="list-group">
						<li class="m-b-20">姓名：<?= $model->user->nickname; ?></li>
						<li class="m-b-20">性别：<?= $model->user->gender == 1 ? "男" : "女"; ?></li>
						<li class="m-b-20">申请项目：<?= AbordCase::dropDown("applicationProject", $model->applicationProject); ?></li>
						<li class="m-b-20">所在年级：<?= $model->grade; ?></li>
					</ul>
				</div>
				<div class="col-xs-6 case-info-right">
					<ul class="list-group">
						<li class="m-b-20">所在学校：<?= $model->currentSchool; ?></li>
						<li class="m-b-20">录取学校：<?= $model->admissionSchool; ?></li>
						<li class="m-b-20">特长：<?= $model->specialty; ?></li>
						<li class="m-b-20">所获奖项：<?= $model->winning; ?></li>
					</ul>
				</div>
			</div>
			<hr class="border-solid" />
			<div class="row case-info-detail case-info-result">
				<h3 class="text-center m-t-10">成绩信息</h3>
				<hr class="cont-tit-border-sm">
				<div class="col-xs-4 text-center">
					<div class="case-info-result-detail">
						<h4>SAT</h4>
						<big><?= $model->sat; ?></big>
					</div>
				</div>
				<div class="col-xs-4 text-center">
					<div class="case-info-result-detail">
						<h4>TOFEL</h4>
						<big><?= $model->toefl; ?></big>
					</div>
				</div>
				<div class="col-xs-4 text-center">
					<div class="case-info-result-detail">
						<h4>GPA</h4>
						<big><?= $model->gpa; ?></big>
					</div>
				</div>
			</div>
			<hr class="border-solid" />
			<div class="row case-info-detail case-detail-licheng">
				<h3 class="text-center m-t-10">申请历程</h3>
				<hr class="cont-tit-border-sm">
				<div class="case-detail-tab-menu">
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active col-xs-1">
							<?php if($casePayment && $casePayment->status == 1): ?>
								<a href="#guihua" role="tab" data-toggle="tab" class="case-detail-tab-menu-outline">规划<br />方案</a>
							<?php else: ?>
								<a href="#" class="m-l-20" data-toggle="modal" data-target="#pay" case_id="<?= $model->case_id; ?>" payment="1" class="case-detail-tab-menu-outline">规划<br />方案</a>
							<?php endif; ?>
						</li>
						<li class="col-xs-2 p-t-10">
							<hr />
						</li>
						<li role="presentation" class="col-xs-1">
							<a href="#qianding" role="tab" data-toggle="tab" class="case-detail-tab-menu-outline">
								签订<br />协议
							</a>
						</li>
						<li class="col-xs-2 p-t-10">
							<hr />
						</li>
						<li role="presentation" class="col-xs-1">
							<?php if($schoolPayment && $schoolPayment->status == 1): ?>
								<a href="#shenxiao" role="tab" data-toggle="tab" class="case-detail-tab-menu-outline">申校<br />名单</a>
							<?php else: ?>
								<a href="#" class="m-l-20" data-toggle="modal" data-target="#pay" case_id="<?= $model->case_id;  ?>" payment="3" class="case-detail-tab-menu-outline">申校<br />名单</a>
							<?php endif; ?>
						</li>
						<li class="col-xs-2 p-t-10">
							<hr />
						</li>
						<li role="presentation" class="col-xs-1">
							<a href="#guanjian" role="tab" data-toggle="tab" class="case-detail-tab-menu-outline">
								关键<br />支持
							</a>
						</li>
						<li class="col-xs-2 p-t-10">
							<hr />
						</li>
						<li role="presentation" class="col-xs-1">
							<a href="#wangshen" role="tab" data-toggle="tab" class="case-detail-tab-menu-outline">
								网申<br />结果
							</a>
						</li>
					</ul>
				</div>

				<!-- Tab panes -->
				<div class="tab-content m-t-30">
					<div role="tabpanel" class="tab-pane fade active in case-detail-tab-cont" id="guihua">
						<ul class="list-group m-0">
							<?php if($casePayment && $casePayment->status == 1): ?>
								<?php foreach($model->course as $key => $val): ?>
									<?php if($val['type'] == 1): ?>
										<li><big class="color-red">·</big> <span class="color-gray m-r-30"><?= date("Y.m.d", strtotime($val['dates'])); ?></span><?= $val['content'] ?></li>
									<?php endif; ?>
								<?php endforeach; ?>
							<?php endif; ?>

<!--							<li><big class="color-red">·</big> <span class="color-gray m-r-30">2016.8.19</span>张同学在留洋帮申校系统中预定了留学规划服务-->
<!--								<a href="#" class="m-l-20" data-toggle="modal" data-target="#pay">查看他的规划方案</a>-->
<!--							</li>-->
<!--							<li><big class="color-red">·</big> <span class="color-gray m-r-30">2016.8.30</span>张同学在留洋帮申校系统中预定留学咨询服务，留学专家李老师与其进行沟通和针对性的指导</li>-->
						</ul>
					</div>
					<div role="tabpanel" class="tab-pane fade case-detail-tab-cont" id="qianding">
						<ul class="list-group m-0">
							<?php foreach($model->course as $key => $val): ?>
								<?php if($val['type'] == 2): ?>
									<li><big class="color-red">·</big> <span class="color-gray m-r-30"><?= date("Y.m.d", strtotime($val['dates'])); ?></span><?= $val['content'] ?></li>
								<?php endif; ?>
							<?php endforeach; ?>
<!--							<li><big class="color-red">·</big> <span class="color-gray m-r-30">2017.8.19</span>张同学在留洋帮申校系统中预定了留学规划服务-->
<!--								<a href="#" class="m-l-20" data-toggle="modal" data-target="#pay">查看他的规划方案2</a>-->
<!--							</li>-->
<!--							<li><big class="color-red">·</big> <span class="color-gray m-r-30">2017.8.30</span>张同学在留洋帮申校系统中预定留学咨询服务，留学专家李老师与其进行沟通和针对性的指导</li>-->
						</ul>
					</div>
					<div role="tabpanel" class="tab-pane fade case-detail-tab-cont" id="shenxiao">
						<ul class="list-group m-0">
							<?php if($schoolPayment && $schoolPayment->status == 1): ?>
								<?php foreach($model->course as $key => $val): ?>
									<?php if($val['type'] == 3): ?>
										<li><big class="color-red">·</big> <span class="color-gray m-r-30"><?= date("Y.m.d", strtotime($val['dates'])); ?></span><?= $val['content'] ?></li>
									<?php endif; ?>
								<?php endforeach; ?>
							<?php endif; ?>
<!--							<li><big class="color-red">·</big> <span class="color-gray m-r-30">2018.8.19</span>张同学在留洋帮申校系统中预定了留学规划服务-->
<!--								<a href="#" class="m-l-20" data-toggle="modal" data-target="#pay">查看他的规划方案3</a>-->
<!--							</li>-->
<!--							<li><big class="color-red">·</big> <span class="color-gray m-r-30">2018.8.30</span>张同学在留洋帮申校系统中预定留学咨询服务，留学专家李老师与其进行沟通和针对性的指导</li>-->
						</ul>
					</div>
					<div role="tabpanel" class="tab-pane fade case-detail-tab-cont" id="guanjian">
						<ul class="list-group m-0">
							<?php foreach($model->course as $key => $val): ?>
								<?php if($val['type'] == 4): ?>
									<li><big class="color-red">·</big> <span class="color-gray m-r-30"><?= date("Y.m.d", strtotime($val['dates'])); ?></span><?= $val['content'] ?></li>
								<?php endif; ?>
							<?php endforeach; ?>
<!--							<li><big class="color-red">·</big> <span class="color-gray m-r-30">2015.8.19</span>张同学在留洋帮申校系统中预定了留学规划服务-->
<!--								<a href="#" class="m-l-20" data-toggle="modal" data-target="#pay">查看他的规划方案4</a>-->
<!--							</li>-->
<!--							<li><big class="color-red">·</big> <span class="color-gray m-r-30">2015.8.30</span>张同学在留洋帮申校系统中预定留学咨询服务，留学专家李老师与其进行沟通和针对性的指导</li>-->
						</ul>
					</div>
					<div role="tabpanel" class="tab-pane fade case-detail-tab-cont" id="wangshen">
						<ul class="list-group m-0">
							<?php foreach($model->course as $key => $val): ?>
								<?php if($val['type'] == 5): ?>
									<li><big class="color-red">·</big> <span class="color-gray m-r-30"><?= date("Y.m.d", strtotime($val['dates'])); ?></span><?= $val['content'] ?></li>
								<?php endif; ?>
							<?php endforeach; ?>
<!--							<li><big class="color-red">·</big> <span class="color-gray m-r-30">2019.8.19</span>张同学在留洋帮申校系统中预定了留学规划服务-->
<!--								<a href="#" class="m-l-20" data-toggle="modal" data-target="#pay">查看他的规划方案5</a>-->
<!--							</li>-->
<!--							<li><big class="color-red">·</big> <span class="color-gray m-r-30">2019.8.30</span>张同学在留洋帮申校系统中预定留学咨询服务，留学专家李老师与其进行沟通和针对性的指导</li>-->
						</ul>
					</div>
				</div>

			</div>
			<hr class="border-solid" />
			<div class="row case-info-detail small-box">
				<h3 class="text-center m-t-10">专家点评</h3>
				<hr class="cont-tit-border-sm">
				<div class="media col-xs-12 p-l-35 p-r-35">
					<div class="media-left media-middle">
						<img class="media-object" data-src="holder.js/64x64" alt="64x64" src="<?= Url::to($model->expertComments->expert->headimgurl); ?>" width="70">
					</div>
					<div class="media-body p-l-10">
						<h5 class="media-heading"><b><?= $model->expertComments->expert->username; ?>老师</b></h5>
						<p class="m-0"><?= $model->expertComments->content; ?></p>
					</div>
					<hr class="border-dashed" />
				</div>
				<div class="col-xs-12 p-l-35 p-r-35" data-toggle="modal" data-target="#pay">
					<span class="color-gray">案例分析音频</span>
					<audio src="<?= Url::to($audio); ?>" controls="controls" preload="auto" class="audio-style m-l-10"> </audio> <span class="m-l-10 color-lightgray">（此音频语言为<?= $model->expertComments->language == 1 ? "中文" : "英文"; ?>）</span>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal payment" tabindex="-1" role="dialog" id="pay">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title color-blue">支付</h4>
			</div>
			<div class="modal-body m-t-15 m-b-10 p-t-5">
				<h4 class="text-center m-t-0">支付金额：<b class="color-red">5</b>元</h4>
				<form action="" method="post">
					<div class="row m-t-20">
						<div class="col-xs-6 text-center p-l-35">
							<img src="<?= Url::to("/img/wechat_icon.jpg"); ?>" width="50" />
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" id="optionsRadios1" value="wxpay" checked>
									微信
								</label>
							</div>
						</div>
						<div class="col-xs-6 text-center p-r-35">
							<img src="<?= Url::to("/img/alipay_icon.jpg"); ?>" width="50" />
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" id="optionsRadios2" value="alipay">
									支付宝
								</label>
							</div>
						</div>
					</div>
				</form>
				<div class="text-center m-t-10">
					<button id="payment" class="btn btn-blue btn-big-size btn-lg btn-block">点击支付</button>
<!--					<a href="" class="btn btn-blue btn-big-size btn-lg btn-block">点击支付</a>-->
				</div>
			</div>
		</div>
	</div>
</div>
<?php
$js = <<<JS
	var domain = document.domain;
	var payment;
	var case_id;

	$("#pay").on("shown.bs.modal", function(e){
		obj = $(e.relatedTarget);
		case_id = obj.attr("case_id");
		payment = obj.attr("payment");
	});

	$("#payment").click(function(){
		var pay_from = $("input[type='radio']:checked").val();
		var subject = "留学案例";
		var amount = "5";
		var body = "北京联校传奇信息科技有限公司";
		if(pay_from == "alipay"){
			//支付宝
			//'subject', 'amount', 'body', 'case_id', 'payment'
			window.location.href = "http://" + domain + "/alipay/index?case_id=" + case_id + "&subject=" + subject + "&amount=" + amount + "&body=" + body + "&payment=" + payment;
		}
	});
JS;

$this->registerJs($js);
?>