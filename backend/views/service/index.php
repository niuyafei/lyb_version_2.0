<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/11/5
 * Time: 上午1:25
 */

use yii\widgets\LinkPager;
use yii\helpers\Html;

$this->title = "延伸服务";
?>
<div class="col-xs-10">
	<h4 class="color-blue"><?= $this->title; ?></h4>
	<hr class="m-t-5" />
	<div class="p-20 p-t-0">
		<table class="table text-center admin-cont-table-col">
			<thead>
				<tr>
					<th class="text-center">ID</th>
					<th class="text-center">姓名</th>
					<th class="text-center">联系电话</th>
					<th class="text-center">咨询项目</th>
					<th class="text-center">咨询时间</th>
					<th class="text-center">沟通状态</th>
					<th class="text-center">沟通人</th>
					<th class="text-center">沟通时间</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($data as $key => $value): ?>
					<tr>
						<td><?= $value['service_id'] ?></td>
						<td><?= $value['username']; ?></td>
						<td><?= $value['phone'] ?></td>
						<td>
<!--							<a href="#" target="_blank">夏校项目</a>-->
							<?= \common\models\Service::dropDown($value['type']); ?>
						</td>
						<td>2017-08-09 12:00</td>
						<td>
							<?= $value['status'] == 1 ? "未沟通" : "已沟通"; ?>
						</td>
						<td>
							<select class="form-control" name="expert" service_id="<?= $value['service_id']; ?>">
								<?= is_null($value['expert_id']) ? "<option>暂无</option>" : ""; ?>
								<?php foreach($experts as $k => $v): ?>
									<option value="<?= $v['expert_id'] ?>"><?= $v['username']; ?></option>
								<?php endforeach; ?>
							</select>
						</td>
						<td id="updated">
							<?= $value['updated_at']; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<hr class="m-0" />
		<nav class="text-center">
			<?= LinkPager::widget([
				'pagination' => $pages
			]); ?>
		</nav>
	</div>
</div>
<?php
$js = <<<JS
	domain = document.domain;
	url = "http://" + domain + "/service/addexpert";

	$("select[name='expert']").change(function(){
		var expert_id = $(this).val();
		var service_id = $(this).attr("service_id");
		if(expert_id){
			$.get(url+"?expert_id="+expert_id+"&service_id="+service_id , function(re){
				var data = eval("(" + re + ")");
				if(data.code == 200){
					alert("沟通成功");
					$("#updated").text(data.updated);
				}else{
					alert(data.message);
				}
			})
		}
	});
JS;

$this->registerJs($js);
?>