<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/10/28
 * Time: 上午10:40
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = "延伸服务";
?>

<div class="container">
	<h2 class="text-center m-t-30">延伸服务</h2>
	<hr class="cont-tit-border">
	<ul class="nav nav-tabs m-t-30 view-tab-menu" role="tablist">
		<li>
			<a href="<?= Url::to(['service/index']); ?>">背景提升</a>
		</li>
		<li>
			<a href="<?= Url::to(['service/interview']); ?>">面试特训</a>
		</li>
		<li>
			<a href="<?= Url::to(['service/summer']); ?>">夏校项目</a>
		</li>
		<li class="active">
			<a href="#">实习项目</a>
		</li>
	</ul>
	<div class="border-color p-20 p-b-0 view-tab-cont p-b-20">
		<div class="p-l-20 p-r-20 p-t-10">
			<h4 class="color-blue m-0">项目介绍</h4>
			<hr class="cont-tit-border-zhuanti pull-left">
			<h5 class="color-blue clear">美国名校科研名企实习</h5>
			<p>进入美国名校实验室/科研组，接触尖端科学<br /> 获得美国导师推荐信+科研证书
				<br /> 针对特定职位打造个性化实习
				<br /> 高含金量收获助力未来留学深造及就业
			</p>
			<br />
			<h5 class="color-blue">顶尖的学术辅导资源</h5>
			<p>美国名校科研项目组，致力于为优秀学生提供顶尖的学术辅导，留学申请学术背景提升服务，协调美国高校的教授、博士生资源，以实际帮助学生申请到名校硕博为最终目标，开展一系列的学术交流活动。</p>
			<br />
			<h5 class="color-blue">独特的名校科研背景</h5>
			<p>夏季学校申请，一个班级有时会有50人，甚至100人，不具备稀缺性。而申请名校的过程，就是展示独一无二的自己，所以名校科研对未来留学更具有推动作用。同时，还有一点，我们常见的带薪实习、夏季学校、游学，往往名额非常多，非常充裕，众多候选人都有的一份经历，本质来讲对名校录取的帮助会非常有限。而名校科研活动，每个项目的名额就那么几个，如果想参加，必须提早报名，参加后对于申请名校的帮助显而易见，以UCLA的CSST项目为例，几乎所有参与科研的学生，都获得了名校的录取。</p>
			<br />
			<h5 class="color-blue">强大的精英导师阵容</h5>
			<p>一站式实习服务的导师来自高盛、花旗银行、摩根斯坦利、谷歌、亚马逊、摩根大通等世界顶尖投行、管理咨询公司、四大会计事务所、科技公司，他们一对一为学生进行全方位的辅导，帮助学生自我定位，确定个人职业发展规划，从内而外全面提升自己，蜕变成为一个全球最优秀的精英。</p>
			<br />
			<h5 class="color-blue">丰富的实习服务内容</h5>
			<p>来自世界顶尖公司的精英导师的全程辅导与跟进，简历修改，求职信指导，模拟面试，实习辅导，社交课程以及丰富的线上线下互动课程。</p>
			<table class="table table-bordered clear zhuanti-table m-t-50">
				<thead>
				<tr>
					<th class="text-center" width="150">专业</th>
					<th class="text-center">细分和交叉方向</th>
					<th class="text-center">大学</th>
					<th class="text-center">适合群体</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td class="text-center">经济</td>
					<td>金融/博弈论/建模</td>
					<td>哈佛大学</td>
					<td rowspan="14" class="text-center">中学生+大学生</td>
				</tr>
				<tr>
					<td class="text-center">医学</td>
					<td>生物/药学/心理/免疫学/计算机/数学</td>
					<td>哈佛大学</td>
				</tr>
				<tr>
					<td class="text-center">化学</td>
					<td>化工/能源/机械工程/电子/数学</td>
					<td>哈佛大学</td>
				</tr>
				<tr>
					<td class="text-center">城市规划</td>
					<td>景观设计/公共政策/教育学</td>
					<td>哈佛大学</td>
				</tr>
				<tr>
					<td class="text-center">建筑设计</td>
					<td>土木/计算机（设计软件方向）</td>
					<td>哈佛大学</td>
				</tr>
				<tr>
					<td class="text-center">计算机</td>
					<td>人工智能/深度网络学习/网络安全/机器学习/传媒</td>
					<td>卡内基梅隆大学</td>
				</tr>
				<tr>
					<td class="text-center">土木工程</td>
					<td>建筑/景观设计/建筑造价</td>
					<td>哥伦比亚大学</td>
				</tr>
				<tr>
					<td class="text-center">环境工程</td>
					<td>能源经济学/经济学/能源</td>
					<td>加州大学伯克利分校</td>
				</tr>
				<tr>
					<td class="text-center">电子工程</td>
					<td>计算机/线路设计</td>
					<td>伊利诺伊香槟分校</td>
				</tr>
				<tr>
					<td class="text-center">金融工程</td>
					<td>运筹学/金融/经济</td>
					<td>哥伦比亚大学</td>
				</tr>
				<tr>
					<td class="text-center">统计学</td>
					<td>金融/数学/物理/大数据分析/数据挖掘</td>
					<td>加州大学伯克利分校</td>
				</tr>
				<tr>
					<td class="text-center">统计学</td>
					<td>人工智能/机器学习/计算机/深度网络学习</td>
					<td>斯坦福大学</td>
				</tr>
				<tr>
					<td class="text-center">物理</td>
					<td>量子物理/理论物理/天体物理</td>
					<td>宾夕法尼亚大学</td>
				</tr>
				<tr>
					<td class="text-center">交通工程</td>
					<td>机械工程/数学/电子</td>
					<td>麻省理工学院</td>
				</tr>
				</tbody>
			</table>

			<hr class="border-dashed" />
		</div>

		<div class="p-l-20 p-r-20 p-t-10">
			<h4 class="color-blue m-0">价格详情</h4>
			<hr class="cont-tit-border-zhuanti pull-left">
			<p class="clear">根据具体的服务情况进行定价。</p>
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
		var type = 4;
		$.post("/service/create", {"_csrf-frontend":csrf,"Service[username]":username,"Service[phone]":phone,"Service[type]:":type}, function(re){
			if(re){
				$(".modal").modal("toggle");
			}else{
				alert("保存失败");
			}
		});
	});
JS;

$this->registerJs($js);
?>