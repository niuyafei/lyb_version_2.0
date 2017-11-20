<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/11/5
 * Time: 上午2:18
 */
use yii\widgets\LinkPager;

$this->title = "预约咨询";
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
					<th class="text-center">性别</th>
					<th class="text-center">联系电话</th>
<!--					<th class="text-center">预约内容</th>-->
					<th class="text-center">预约信息</th>
<!--					<th class="text-center">预约日期</th>-->
<!--					<th class="text-center">预约时间</th>-->
					<th class="text-center">付款状态</th>
					<th class="text-center">沟通状态</th>
					<th class="text-center">管理</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($data as $key => $value): ?>
					<tr>
						<td><?= $value['consultation_id'] ?></td>
						<td><?= $value['username']; ?></td>
						<td><?= $value['gender'] == 1 ? "男" : "女"; ?></td>
						<td><?= $value['phone']; ?></td>
						<!-- <td><?//= \common\models\Consultation::dropDown("type", $value['type']); ?></td> -->
						<td>
							<a href="#" data-toggle="modal" data-target="#chakanneirong_<?= $value['consultation_id']; ?>">查看内容</a>
						</td>
						<!-- <td><?//= $value['dates']; ?></td> -->
						<!-- <td><?//= $value['times']; ?></td> -->
						<td><?= $value['payment']['status'] == 1 ? "已支付" : "未支付"; ?></td>
						<td>
							<select name="status" class="form-control" consultation_id="<?= $value['consultation_id']; ?>">
								<?php foreach(\common\models\Consultation::dropDown("status") as $k => $v): ?>
									<option value="<?= $k; ?>" <?= $value['status'] == $k ? "selected" : ""; ?>  ><?= $v; ?></option>
								<?php endforeach; ?>
							</select>
						</td>
						<td>
							<?php if(!$value['admin_id']): ?>
								<a class="btn <?= $value['payment']['status'] == 1 ? "" : "disabled color-gray"; ?>" href="#" data-toggle="modal" data-target="#xuanzhuanjia" consultation_id="<?= $value['consultation_id']; ?>">选专家</a>
							<?php elseif(!$value['communicationRecord']): ?>
								<a href="#" data-toggle="modal" data-target="#wanchenggoutong" consultation_id="<?= $value['consultation_id']; ?>">完成沟通</a>
							<?php else: ?>
								<a href="#" data-toggle="modal" data-target="#goutongjilu" consultation_id="<?= $value['consultation_id']; ?>">沟通记录</a><br/>
								<a class="btn <?= !empty($value['starts']) ? "" : "disabled color-gray"; ?>" href="#" data-toggle="modal" data-target="#pingjiajianyi_<?= $value['consultation_id'] ?>" consultation_id="<?= $value['consultation_id']; ?>">评价建议</a>
							<?php endif; ?>
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

<!-- 其他需求开始 -->
<?php foreach($data as $key => $value): ?>
<div class="modal" tabindex="-1" role="dialog" id="chakanneirong_<?= $value['consultation_id']; ?>">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title color-blue">预约信息</h5>
			</div>
			<div class="modal-body">
				<tr>
					<td>预约内容：</td>
					<td><?= \common\models\Consultation::dropDown("type", $value['type']); ?></td>
				</tr>
				<br/>
				<tr>
					<td>其他需求：</td>
					<td><?= !empty($value['others']) ? $value['others'] : "无内容"; ?></td>
				</tr>
				<br/>
				<tr>
					<td>预约日期：</td>
					<td><?= $value['dates']; ?></td>
				</tr>
				<br/>
				<tr>
					<td>预约时间：</td>
					<td><?= $value['times']; ?></td>
				</tr>
				<p></p>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>
<!-- 其他需求结束 -->

<!-- 选专家开始 -->
<div class="modal" tabindex="-1" role="dialog" id="xuanzhuanjia">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title color-blue">选专家</h5>
			</div>
			<div class="modal-body">
				<select class="form-control" name="admin_id">
					<?php foreach(\common\models\Expert::getExperts() as $k => $v): ?>
						<option value="<?= $k; ?>"><?= $v; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- 选专家结束 -->

<div class="modal" tabindex="-1" role="dialog" id="wanchenggoutong">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title color-blue">完成沟通</h5>
			</div>
			<div class="modal-body">
				<form action="">
					<p><b>沟通记录</b></p>
					<textarea name="communicationRecord" class="form-control" placeholder="记录您与用户沟通过程中的相关要点，字数不超过500字。" style="min-height: 150px;"></textarea>
				</form>
			</div>
			<div class="modal-footer">
				<button id="communicationRecord" type="button" class="btn btn-blue">提交</button>
			</div>
		</div>
	</div>
</div>

<!-- 沟通记录开始 -->
<div class="modal" tabindex="-1" role="dialog" id="goutongjilu">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title color-blue">沟通记录</h5>
			</div>
			<div class="modal-body">
				<form action="">
					<p><b>沟通状态</b></p>
					<p name="gtzt">已完成</p>
					<p><b>专家姓名</b></p>
					<p name="admin_id">金正浩</p>
					<p><b>沟通记录</b></p>
					<p name="communicationRecord">整个沟通过程中张三同学一共提 了四个问题，分别是：1.我要考耶鲁大学，现 在需要做些什么；2.需要具备什么条件；3.我 现在应该做些什么；4.什么时候开始申请，我 需要做什么</p>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- 沟通记录结束 -->

<!-- 评价建议开始 -->
<?php foreach($data as $key => $value): ?>
<div class="modal" tabindex="-1" role="dialog" id="pingjiajianyi_<?= $value['consultation_id'] ?>">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title color-blue">评价建议</h5>
			</div>
			<div class="modal-body">
				<form action="">
					<p>
						<b>星级评价</b>
					</p>
					<p>
						<?php for($i=1; $i<=5; $i++): ?>
							<?php if($i<=$value['starts']): ?>
								<img src="/img/star-on-big.png"/>
							<?php else: ?>
								<img src="/img/star-off-big.png"/>
							<?php endif; ?>
						<?php endfor; ?>
					</p>
					<p>
						<b>相关建议</b>
					</p>
					<p><?= !empty($value['advic']) ? $value['advic'] : "无内容"; ?></p>
				</form>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>
<!-- 评价建议 -->

<?php
$js = <<<JS
	var domain = document.domain;
	var url = "http://" + domain;
	var consultation_id;

	$(".modal").on("show.bs.modal", function(e){
		consultation_id = $(e.relatedTarget).attr("consultation_id");
		console.log(consultation_id);
	})

	$("select[name='admin_id']").change(function(){
		var expert_id = $(this).val();
		$.get(url+"/consultation/addexpert?consultation_id="+consultation_id+"&expert_id="+expert_id, function(re){
			data = eval("(" + re + ")");
			if(data.code == 200){
				layer.open({
		            title:'成功信息',
		            content:'专家选择成功',
		        });
			}else{
				layer.open({
		            title:'警告信息',
		            content:data.message,
		        });
			}
			setTimeout(function(){window.location.reload();}, 1000);
		})
	});

	$("#communicationRecord").click(function(){
		var record = $("textarea[name='communicationRecord']").val();
		$.get(url+"/consultation/addrecord?consultation_id="+consultation_id+"&record="+record, function(re){
			data = eval("(" + re + ")");
			if(data.code == 200){
				layer.open({
		            title:'成功信息',
		            content:'沟通成功',
		        });
			}else{
				layer.open({
		            title:'警告信息',
		            content:data.message,
		        });
			}
			setTimeout(function(){window.location.reload();}, 1000);
		});
	});

	$("#goutongjilu").on("show.bs.modal", function(e){
		$.get(url+"/consultation/getmodelbyid?consultation_id="+consultation_id, function(re){
			var data = eval("(" + re + ")");
			console.log(data.status);
			$("p[name='admin_id']").text(data.expert_username);
			$("p[name='communicationRecord']").text(data.communicationRecord);
			$("p[name='gtzt']").text(data.status);
		})
	});

	$("select[name='status']").change(function(){
		var status = $(this).val();
		var consultation_id = $(this).attr("consultation_id");
		$.get(url+"/consultation/changestatus?status=" + status + "&consultation_id=" + consultation_id, function(re){
			data = eval("(" + re + ")");
			if(data.code == 200){
				//修改成功
				layer.open({
		            title:'警告信息',
		            'content':'修改成功',
		        });
			}else{
				//修改失败
				layer.open({
		            title:'警告信息',
		            'content':data.message,
		        });
		        setTimeout(function(){
		        	window.location.reload();
		        }, 1000);
			}
		});

	});
JS;

$this->registerJs($js);
?>