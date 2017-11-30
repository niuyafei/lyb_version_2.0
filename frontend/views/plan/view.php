<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/10/30
 * Time: 下午10:20
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$schools = $model->schools;
$sort = [];
foreach($schools as $key => $value){
	$sort[$key] = $value['rank'];
}
array_multisort($sort, SORT_ASC, $schools);
$dreamSchoolList = [];
$goalSchoolList = [];
$endmSchoolList = [];

array_map(function($school) use(&$dreamSchoolList, &$goalSchoolList, &$endSchoolList){
	if($school['type'] == 1){
		$dreamSchoolList[] = $school;
	}else if($school['type'] == 2){
		$goalSchoolList[] = $school;
	}else if($school['type'] == 3){
		$endSchoolList[] = $school;
	}
}, $schools);

$timePlan = $model->timePlan;
$grade = [];
array_map(function($item) use(&$grade){
	if($item['grade'] == 1){
		$grade[1][] = $item;
	}else if($item['grade'] == 2){
		$grade[2][] = $item;
	}else if($item['grade'] == 3){
		$grade[3][] = $item;
	}
}, $timePlan);
ksort($grade);
//var_dump($grade);exit;

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
			<span class="gray-circle">
				2
					</span>
			<h4 class="color-gray">支付费用</h4>
		</div>
		<div class="col-xs-3">
			<p class="gray-line"></p>
		</div>
		<div class="col-xs-2 text-center">
			<span class="red-circle">
				3
			</span>
			<h4 class="color-red">查看方案</h4>
		</div>
	</div>
	<div>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs m-t-30 view-tab-menu" role="tablist">
			<li role="presentation" class="active">
				<a href="#celve" role="tab" data-toggle="tab">申请策略</a>
			</li>
			<li role="presentation">
				<a href="#xuanxiao" role="tab" data-toggle="tab">选校列表</a>
			</li>
			<li role="presentation">
				<a href="#shijian" role="tab" data-toggle="tab">时间规划</a>
			</li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content p-20 view-tab-cont">
			<div role="tabpanel" class="tab-pane active" id="celve">
				<div class="view-tab-contdetail">
					<h3 class="text-center m-t-30">申请策略</h3>
					<hr class="cont-tit-border-sm" />
					<?= $model->studyPlan->strategy; ?>
				</div>
				<div class="view-tab-contdetail">
					<h3 class="text-center m-t-30">优劣势分析</h3>
					<hr class="cont-tit-border-sm" />
					<?php
						$analysis = $model->studyPlan->analysis;
						echo str_replace("-*-", "<br/><p></p>", $analysis);
					?>
				</div>
				<div class="view-tab-contdetail">
					<h3 class="text-center m-t-30">总体建议</h3>
					<hr class="cont-tit-border-sm" />
					<?= $model->studyPlan->advice; ?>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane" id="xuanxiao">
				<div class="view-tab-contdetail">
					<h3 class="text-center m-t-30">选校列表</h3>
					<hr class="cont-tit-border-sm" />
					<table class="table table-bordered school-list">
						<tbody>
						<tr>
							<td rowspan="<?= count($dreamSchoolList)+1; ?>" class="text-center school-list-tit color-blue" width="110"> <b>梦想学校</b></td>
							<td class="text-center"><b>学校排名</b></td>
							<td class="text-center"><b>学校名称</b></td>
							<td class="text-center"><b>SAT要求</b></td>
							<td class="text-center"><b>申请方式</b></td>
						</tr>
						<?php foreach($dreamSchoolList as $key => $value): ?>
							<tr>
								<td class="text-center" width="100"><?= $value['rank']; ?></td>
								<td><?= $value['schoolName'] ?><br /> <?= $value['schoolName_en']; ?></td>
								<td class="text-center" width="100"><?= $value['sat'] ?></td>
								<td class="text-center" width="110"><?= $value['applyType']; ?></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
					<table class="table table-bordered school-list">
						<tbody>
						<tr>
							<td rowspan="<?= count($goalSchoolList)+1; ?>" class="text-center school-list-tit color-green" width="110"> <b>目标学校</b></td>
							<td class="text-center"><b>学校排名</b></td>
							<td class="text-center"><b>学校名称</b></td>
							<td class="text-center"><b>SAT要求</b></td>
							<td class="text-center"><b>申请方式</b></td>
						</tr>
						<?php foreach($goalSchoolList as $key => $value): ?>
							<?php //if($key > 3) break; ?>
							<tr>
								<td class="text-center" width="100"><?= $value['rank']; ?></td>
								<td><?= $value['schoolName'] ?><br /> <?= $value['schoolName_en']; ?></td>
								<td class="text-center" width="100"><?= $value['sat'] ?></td>
								<td class="text-center" width="110"><?= $value['applyType']; ?></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
					<table class="table table-bordered school-list">
						<tbody>
						<tr>
							<td rowspan="<?= count($endSchoolList)+1; ?>" class="text-center school-list-tit color-orange" width="110"> <b>保底学校</b></td>
							<td class="text-center"><b>学校排名</b></td>
							<td class="text-center"><b>学校名称</b></td>
							<td class="text-center"><b>SAT要求</b></td>
							<td class="text-center"><b>申请方式</b></td>
						</tr>
						<?php foreach($endSchoolList as $key => $value): ?>
							<tr>
								<td class="text-center" width="100"><?= $value['rank']; ?></td>
								<td><?= $value['schoolName'] ?><br /> <?= $value['schoolName_en']; ?></td>
								<td class="text-center" width="100"><?= $value['sat'] ?></td>
								<td class="text-center" width="110"><?= $value['applyType']; ?></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div class="view-tab-contdetail">
					<h3 class="text-center m-t-30">推荐理由</h3>
					<hr class="cont-tit-border-sm" />
					<?php
						$recommendation = $model->studyPlan->recommendation;
						foreach(explode("-*-", $recommendation) as $key => $value):
					?>
						<h5><b>推荐学校理由 - <?= $key+1; ?></b></h5>
						<p><?= $value; ?></p>
					<?php endforeach; ?>
				</div>
				<div class="view-tab-contdetail">
					<h3 class="text-center m-t-30">选校策略</h3>
					<hr class="cont-tit-border-sm" />
					<?= $model->studyPlan->schoolStrategy; ?>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane" id="shijian">
				<?php foreach($grade as $key => $value): ?>
					<?php if($value[0]['content'] == "") continue; ?>
					<div class="view-tab-contdetail">
						<h3 class="text-center m-t-30"><?= \common\models\TimePlan::dropDown($key, "grade"); ?></h3>
						<hr class="cont-tit-border-sm" />
						<div class="row time-plan">
							<?php foreach($value as $k => $v): ?>
							<?php $i=0; ?>
								<?php if($k%2 ==0): ?>
									</div>
									<div class="row time-plan">
								<?php endif; ?>
							<div class="col-xs-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title"><b><?= \common\models\TimePlan::dropDown($v['type'], 'type') ?></b></h3>
										<p class="color-gray m-0"><?= $v['dates']; ?></p>
									</div>
									<div class="panel-body">
										<ul class="list-group">
											<?php
												$content = explode("，", $v['content']);
												if(count($content == 1)){
													$content = explode("\r\n", $v['content']);
												}
											foreach($content as $itemKey => $itemValue): ?>
												<?php if($itemKey == 3): ?>
													<?php $i=3; break; ?>
												<?php endif; ?>
												<li class="m-t-10"><?= $itemValue ?></li>
											<?php endforeach; ?>
										</ul>
										<?php if($i == 3): ?>
											<a href="" class="" data-toggle="modal" data-target="#time-plan-detail_<?= $v['id']; ?>">查看更多</a>
										<?php endif; ?>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

	</div>
	<div class="text-center m-t-50">
		<a href="<?= Url::to("/consultation/index"); ?>" class="btn btn-blue btn-big-size btn-lg">预约咨询</a>
	</div>
</div>
<!-- 模态框开始 -->
<?php foreach($grade as $key => $value): ?>
	<?php foreach($value as $k => $v): ?>
		<?php
			$content = explode("，", $v['content']);
			if(count($content) == 1){
				$content = explode("\r\n", $v['content']);
			}
		?>
		<?php if(count($content) > 2): ?>
			<div class="modal" id="time-plan-detail_<?= $v['id']; ?>">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel"><?= \common\models\TimePlan::dropDown($v['type'], 'type'); ?></h4>
							<p class="m-0"><small class="color-gray"><?= $v['dates'] ?></small></p>
						</div>
						<div class="modal-body">
							<ul class="list-group">
								<?php array_map(function($item) use($v){
									echo "<li class=\"m-t-10\">".$item." <small class=\"color-gray pull-right\">".substr($v['dates'], (strpos($v['dates'], "-")+1))."</small></li>";
								}, $content); ?>
							</ul>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-blue btn-block" data-dismiss="modal">关闭</button>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endforeach; ?>
<!-- 模态框结束 -->