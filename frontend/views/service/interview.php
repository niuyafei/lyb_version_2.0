<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/10/28
 * Time: 上午2:31
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title='延伸服务';
?>
<div class="container">
	<h2 class="text-center m-t-30">延伸服务</h2>
	<hr class="cont-tit-border">
	<ul class="nav nav-tabs m-t-30 view-tab-menu" role="tablist">
		<li>
			<a href="<?= Url::to(['service/index']); ?>">背景提升</a>
		</li>
		<li class="active">
			<a href="#">面试特训</a>
		</li>
		<li>
			<a href="<?= Url::to(['service/summer']); ?>">夏校项目</a>
		</li>
		<li>
			<a href="<?= Url::to(['service/practice']); ?>">实习项目</a>
		</li>
	</ul>
	<div class="border-color p-20 p-b-0 view-tab-cont p-b-20">
		<div class="p-l-20 p-r-20 p-t-10">
			<h4 class="color-blue m-0">项目介绍</h4>
			<hr class="cont-tit-border-zhuanti pull-left">
			<p class="clear">中国有句俗语叫“见面三分亲”，国外院校也认这个理儿，但前提是准备充分，口语流利，沟通自然。</p>
			<br />
			<p>美国院校的面试又分为三种：</p>
			<p>第一种是招生官面试，名额有限，需要严格提前预约，亲自到校，门槛最高，效果也最好；</p>
			<p>第二种是面试官面试，一般由校友担任，可以到校也可以在本地的，比如在北京、上海都可；</p>
			<p>第三种是第三方面试，也就是校方委托第三方机构做面试，也就是通常所说的电话面试，效果有限。</p>
			<p>留洋帮会帮您约到最高级别的面试机会，并在此前提供特别的面试训练，由现任或有丰富经验的美国大学招生面试官员全仿真训练，帮您大大提升面试竞争力。</p>
			<hr class="border-dashed" />
		</div>
		<div class="p-l-20 p-r-20 p-t-10">
			<h4 class="color-blue m-0">适合群体</h4>
			<hr class="cont-tit-border-zhuanti pull-left">
			<p class="clear">准备申请美国TOP50的申请者</p>
			<hr class="border-dashed" />
		</div>
		<div class="p-l-20 p-r-20 p-t-10">
			<h4 class="color-blue m-0">价格详情</h4>
			<hr class="cont-tit-border-zhuanti pull-left">
			<p class="clear">根据具体的服务情况进行定价</p>
			<hr class="border-dashed" />
		</div>
		<div class="p-l-20 p-r-20 p-t-10">
			<h4 class="color-blue m-0">咨询方式</h4>
			<hr class="cont-tit-border-zhuanti pull-left">
			<p class="clear">如果您对本项目有兴趣或者有疑问，欢迎拨打留洋帮客服电话 <span class="color-blue">4006100025</span>，或者添加小助手微信 <span class="color-blue">lybkf888</span> 与我们联系。</p>
		</div>
	</div>
	<div class="border-color p-20 p-b-0 m-t-20 p-b-20">
		<div class="row m-t-10">
			<div class="col-xs-7 p-l-30">
				<p>客服热线：400 610 0025</p>
				<br />
				<p>官方网站：liuyangbang.cn</p>
				<br />
				<p>邮箱地址：lyb@liuyangbang.cn</p>
				<br />
				<p>中国办公室：北京市东城区东四十条甲22号南新仓商务大厦A座1510 100007</p>
				<br />
				<p>美国办公室：1133 15th St.NW 8th Floor Washington，DC USA 20005</p>
			</div>
			<div class="col-xs-5 p-r-30">
				<div class="row m-t-30">
					<div class="col-xs-6 text-center">
						<img src="<?= Url::to("/img/qrcord_01.jpg"); ?>" />
						<p class="color-blue">留洋帮公众号</p>
					</div>
					<div class="col-xs-6 text-center">
						<img src="<?= Url::to("/img/qrcord_01.jpg"); ?>" />
						<p class="color-blue">留洋帮小助手</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="text-center m-t-50">
		<a href="" class="btn btn-blue btn-big-size btn-lg" data-toggle="modal" data-target="#order">咨询详情</a>
	</div>
</div>
<?php
$form = ActiveForm::begin([
	'action' => ['service/create'],
	'method' => 'post'
])
?>
	<div class="modal" tabindex="-1" role="dialog" id="order">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title color-blue">预约咨询</h4>
				</div>
				<div class="modal-body">
					<p class="color-red"><small>我们会在24小时内联系您，请保持手机畅通。</small></p>
					<form class="m-t-20">
						<div class="form-group">
							<?= $form->field($model, "username")->textInput(['placeholder' => '姓名'])->label(false); ?>
							<!--						<input type="text" class="form-control" placeholder="姓名">-->
						</div>
						<div class="form-group">
							<?= $form->field($model, 'phone')->textInput(['placeholder' => '手机号'])->label(false); ?>
							<!--						<input type="text" class="form-control" placeholder="手机号">-->
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-blue submit">提交</button>
				</div>
			</div>
		</div>
	</div>
<?php ActiveForm::end(); ?>
<?php
$js = <<<JS
	$(".submit").click(function(){
		var username = $("input[name='ServiceForm[username]']").val();
		var phone = $("input[name='ServiceForm[phone]']").val();
		var csrf = $("input[name='_csrf-frontend']").val();
		var type = 2;
		if(!phone.match(/^(1(3|5|7|8)+\d{9})$/)){
			layer.open({
				title:'警告信息',
				content:'手机号码不正确',
			});
			return false;
		}
		$.post("/service/create", {"_csrf-frontend":csrf,"Service[username]":username,"Service[phone]":phone,"Service[type]:":type}, function(re){
			if(re){
				layer.open({
		            title:'success',
		            'content':'预约成功'
		        });
				$("#order").modal("toggle");
			}else{
				alert("保存失败");
			}
		});
	});
JS;

$this->registerJs($js);
?>