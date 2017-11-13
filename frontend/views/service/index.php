<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/10/28
 * Time: 上午2:28
 */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "延伸服务";
?>
<div class="container">
	<h2 class="text-center m-t-30">延伸服务</h2>
	<hr class="cont-tit-border">
	<ul class="nav nav-tabs m-t-30 view-tab-menu" role="tablist">
		<li class="active">
			<a href="#">背景提升</a>
		</li>
		<li>
			<a href="<?= Url::to(['service/interview']); ?>">面试特训</a>
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
			<p class="clear">由斯坦福大学、达特茅斯学院、加州大学、乔治城大学、华盛顿大学、密歇根大学、西北大学等2009年发起建立，组织学生参加社会创新实践（Social Innovation）或健康创新实践（Health Innovation）社会公益活动。优先熟悉美国生活和社会人文，同时可获得相应学分，帮助学生提升申校竞争力。</p>
			<br />
			<h5 class="color-blue">美式思维训练</h5>
			<p>美国实践学术交流项目。</p>

			<h5 class="color-blue">名校合作</h5>
			<p>与包括斯坦福大学、乔治城大学、约翰霍普金斯大学等多所美国顶尖名校合作。</p>

			<h5 class="color-blue">美国大学学分认证</h5>
			<p>参加完项目后，可以获得2-4个美国大学学分，全美认可。</p>

			<h5 class="color-blue">知识就是力量</h5>
			<p>用知识帮助当地人民解决各种现实问题，增长实战经验和体验社会企业家的精神。</p>

			<h5 class="color-blue">学术及背景提升</h5>
			<p>一系列精心设计紧密安排的包括跨学科研究方法和英语语言在内的有关项目培训，帮助学生大大提升申请美国大学的竞争力。</p>

			<h5 class="color-blue">个人成长</h5>
			<p>综合提高学生社会经济问题的实际解决能力和合作意识。</p>
			<br />
			<h5><b>为什么要参加？</b></h5>
			<h5 class="color-blue">1. 美国当前最火爆的社会创业项目</h5>
			<p>美国学术界认可度高，分为社会创新实践 (Social Innovation) 和健康创新实践 (Health Innovation) 社会公益活动。</p>

			<h5 class="color-blue">2. 语言提高，结交精英</h5>
			<p>来自全球的学生通过英语交流，浸泡式语言练习。</p>

			<h5 class="color-blue">3. 背景提升，逆袭名校</h5>
			<p>对报考美国的大学和研究院有帮助。</p>
			<hr class="border-dashed" />
		</div>
		<div class="p-l-20 p-r-20 p-t-10">
			<h4 class="color-blue m-0">行程介绍</h4>
			<hr class="cont-tit-border-zhuanti pull-left">
			<table class="table table-bordered clear zhuanti-table small-table">
				<thead>
				<tr>
					<th width="150" class="text-center">天数</th>
					<th class="text-center">行程内容</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td class="text-center">1 Day</td>
					<td>下午抵达波士顿，住宿进大学，晚上休息倒时差。</td>
				</tr>
				<tr>
					<td class="text-center">2 Day</td>
					<td>上午参观麻省理工大学，下午和项目领队开会谈论项目进度，晚上吃波士顿大虾。</td>
				</tr>
				<tr>
					<td class="text-center">3 Day</td>
					<td>上午参观哈佛大学，下午和项目领队开会谈论项目进度，晚上观看NBA比赛。</td>
				</tr>
				<tr>
					<td class="text-center">4 Day</td>
					<td>全天在麻省理工大学训练，晚上休息。</td>
				</tr>
				<tr>
					<td class="text-center">5 Day</td>
					<td>上午飞到巴拿马，下午到达巴拿马，晚上住进旅馆。</td>
				</tr>
				<tr>
					<td class="text-center">6 Day</td>
					<td>全天在巴拿马城培训，晚上休息。</td>
				</tr>
				<tr>
					<td class="text-center">7 Day</td>
					<td>全天在巴拿马城培训，晚上休息。</td>
				</tr>
				<tr>
					<td class="text-center">8 Day</td>
					<td>全天和当地的企业接手，开始项目，晚上住进住宿家庭。</td>
				</tr>
				<tr>
					<td class="text-center">9-17 Day</td>
					<td>进行项目运营及举行结业仪式。</td>
				</tr>
				<tr>
					<td class="text-center">18 Day</td>
					<td>准备出发，飞回中国。</td>
				</tr>
				</tbody>
			</table>
			<hr class="border-dashed" />
		</div>
		<div class="p-l-20 p-r-20 p-t-10">
			<h4 class="color-blue m-0">适合群体</h4>
			<hr class="cont-tit-border-zhuanti pull-left">
			<p class="clear">准备申请美国本科的申请者</p>
			<hr class="border-dashed" />
		</div>
		<div class="p-l-20 p-r-20 p-t-10">
			<h4 class="color-blue m-0">价格详情</h4>
			<hr class="cont-tit-border-zhuanti pull-left">
			<p class="clear"><span class="color-blue">6500美元/人</span>，此价格仅供参考，具体以实际为准。</p>
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
				<h4 class="modal-title color-blue">联系信息</h4>
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
				<button id="submit" type="button" class="btn btn-blue submit">提交</button>
			</div>
		</div>
	</div>
</div>
<?php ActiveForm::end(); ?>
<?php
$js = <<<JS
	$("#submit").click(function(){
		var username = $("input[name='ServiceForm[username]']").val();
		var phone = $("input[name='ServiceForm[phone]']").val();
		var csrf = $("input[name='_csrf-frontend']").val();
		var type = 1;

		if(!phone.match(/^(((13[0-9]{1})|159|153)+\d{8})$/)){
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
				layer.open({
		            title:'error',
		            'content':'预约失败，请联系管理员大哥~'
		        });
			}
		});
	});
JS;

$this->registerJs($js);
?>