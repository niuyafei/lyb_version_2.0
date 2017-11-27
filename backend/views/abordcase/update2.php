<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/11/19
 * Time: 上午12:30
 */

use yii\widgets\ActiveForm;
use common\models\AbordCase;
use yii\helpers\Url;

$this->title = "留学案例";
?>
<style>
	.datetimepicker{cursor:pointer}
</style>
<div class="col-xs-10">
	<h4 class="color-blue">留学案例 - 编辑</h4>
	<hr class="m-t-5" />
	<?php $form = ActiveForm::begin([
		'method' => "post",
		'action' => ['abordcase/update2?case_id=' . $caseModel->case_id]
	]); ?>
	<div class="p-20 p-t-0">
		<div class="case-edit-cont">
			<h4 class="text-center m-b-20">学生信息</h4>
			<div class="row case-edit-formwidth">
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b><span class="color-red">*</span> 姓名：</b>
						</div>
						<div class="col-xs-9">
							<?= $form->field($caseModel, "username")->textInput()->label(false); ?>
						</div>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b><span class="color-red">*</span> 所在年级：</b>
						</div>
						<div class="col-xs-9">
							<?= $form->field($caseModel, "grade")->textInput()->label(false); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row case-edit-formwidth">
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b><span class="color-red">*</span> 性别：</b>
						</div>
						<div class="col-xs-9">
							<div class="radio radio-style">
								<label class="p-r-15">
									<input type="radio" <?= $caseModel->gender == 1 ? "checked" : ""; ?> name="AbordCase[gender]" value="1"> 男
								</label>
								<label class="p-r-15">
									<input type="radio" <?= $caseModel->gender == 2 ? "checked" : ""; ?> name="AbordCase[gender]" value="2"> 女
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b><span class="color-red">*</span> 所在学校：</b>
						</div>
						<div class="col-xs-9">
							<?= $form->field($caseModel, "currentSchool")->textInput()->label(false); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row case-edit-formwidth">
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b><span class="color-red">*</span> 申请项目：</b>
						</div>
						<div class="col-xs-9">
							<?= $form->field($caseModel, "applicationProject")->dropDownList(AbordCase::dropDown("applicationProject"))->label(false); ?>
						</div>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b><span class="color-red">*</span> 录取学校：</b>
						</div>
						<div class="col-xs-9">
							<?= $form->field($caseModel, "admissionSchool")->textInput()->label(false); ?>
						</div>
					</div>
				</div>
			</div>

			<div class="row case-edit-formwidth">
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b><span class="color-red">*</span> 录取专业：</b>
						</div>
						<div class="col-xs-9">
							<?= $form->field($caseModel, "admissionMajor")->textInput()->label(false); ?>
						</div>
					</div>
				</div>
			</div>

			<div class="row case-edit-formwidth">
				<div class="col-xs-12">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>特长：</b>
						</div>
						<div class="col-xs-10">
							<?= $form->field($caseModel, "specialty")->textarea()->label(false); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row case-edit-formwidth">
				<div class="col-xs-12">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>所获奖项：</b>
						</div>
						<div class="col-xs-10">
							<?= $form->field($caseModel, "winning")->textarea()->label(false); ?>
						</div>
					</div>
				</div>
			</div>
			<hr />
		</div>
		<div class="case-edit-cont">
			<h4 class="text-center m-b-20">成绩信息</h4>
			<div class="row case-edit-formwidth">
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>SAT：</b>
						</div>
						<div class="col-xs-9">
							<?= $form->field($caseModel, "sat")->textInput()->label(false); ?>
						</div>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>TOEFL：</b>
						</div>
						<div class="col-xs-9">
							<?= $form->field($caseModel, "toefl")->textInput()->label(false); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row case-edit-formwidth">
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>雅思：</b>
						</div>
						<div class="col-xs-9">
							<?= $form->field($caseModel, "ielts")->textInput()->label(false); ?>
						</div>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b> ACT：</b>
						</div>
						<div class="col-xs-9">
							<?= $form->field($caseModel, "act")->textInput()->label(false); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row case-edit-formwidth">
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b> GPA：</b>
						</div>
						<div class="col-xs-9">
							<?= $form->field($caseModel, "gpa")->textInput()->label(false); ?>
						</div>
					</div>
				</div>
			</div>
			<hr />
		</div>
		<div class="case-edit-cont">
			<h4 class="text-center m-b-20">申请历程</h4>
			<div class="row case-edit-formwidth p-l-0 p-r-0 case-edit-licheng">
				<h5 class="color-blue">1. 规划方案</h5>
				<div class="col-xs-12 color-gray m-b-20 ghfa">
					<?php foreach($courseArr as $key => $value): ?>
						<?php if($value['type'] == 1): ?>
							<div class="row" id="row_<?= $value['course_id']; ?>">
								<div class="col-xs-3 text-right p-r-0">
									<?= date("Y-m-d", strtotime($value['dates'])); ?>
								</div>
								<div class="col-xs-9">
									<?= $value['content'] ?>
								</div>
								<div class="col-xs-3 text-left p-r-0">
									<a href="#" data-toggle="modal" data-target="#edit_<?= $value['course_id']; ?>" >编辑</a> | <a href="javascript:void(0);" class="delete" data-id="<?= $value['course_id']; ?>">删除</a>
								</div>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>时间：</b>
						</div>
						<div class="col-xs-9">
							<input type="text" data="time" placeholder="选择时间" class="calendar form-control datetimepicker">
						</div>
					</div>
				</div>
				<div class="col-xs-12 m-t-25">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>内容：</b>
						</div>
						<div class="col-xs-10">
							<textarea data="content" rows="" cols="" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<p class="col-xs-12 text-right m-t-25 m-b-20">
					<button type="button" course_type="1" tag="sqlc" class="btn btn-blue m-r-30">提交</button>
				</p>
			</div>
			<div class="row case-edit-formwidth p-l-0 p-r-0 case-edit-licheng">
				<h5 class="color-blue">2. 签订协议</h5>
				<div class="col-xs-12 color-gray m-b-20 ghfa">
					<?php foreach($courseArr as $key => $value): ?>
						<?php if($value['type'] == 2): ?>
							<div class="row" id="row_<?= $value['course_id']; ?>">
								<div class="col-xs-3 text-right p-r-0">
									<?= date("Y-m-d", strtotime($value['dates'])); ?>
								</div>
								<div class="col-xs-9">
									<?= $value['content'] ?>
								</div>
								<div class="col-xs-3 text-left p-r-0">
									<a href="#" data-toggle="modal" data-target="#edit_<?= $value['course_id']; ?>" >编辑</a> | <a href="javascript:void(0);" class="delete" data-id="<?= $value['course_id']; ?>">删除</a>
								</div>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>时间：</b>
						</div>
						<div class="col-xs-9">
							<input type="text" data="time" placeholder="选择时间" class="calendar form-control datetimepicker">
						</div>
					</div>
				</div>
				<div class="col-xs-12 m-t-25">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>内容：</b>
						</div>
						<div class="col-xs-10">
							<textarea data="content" rows="" cols="" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<p class="col-xs-12 text-right m-t-25 m-b-20">
					<button type="button" course_type="2" tag="sqlc" class="btn btn-blue m-r-30">提交</button>
				</p>
			</div>
			<div class="row case-edit-formwidth p-l-0 p-r-0 case-edit-licheng">
				<h5 class="color-blue">3. 申校名单</h5>
				<div class="col-xs-12 color-gray m-b-20 ghfa">
					<?php foreach($courseArr as $key => $value): ?>
						<?php if($value['type'] == 3): ?>
							<div class="row" id="row_<?= $value['course_id']; ?>">
								<div class="col-xs-3 text-right p-r-0">
									<?= date("Y-m-d", strtotime($value['dates'])); ?>
								</div>
								<div class="col-xs-9">
									<?= $value['content'] ?>
								</div>
								<div class="col-xs-3 text-left p-r-0">
									<a href="#" data-toggle="modal" data-target="#edit_<?= $value['course_id']; ?>" >编辑</a> | <a href="javascript:void(0);" class="delete" data-id="<?= $value['course_id']; ?>">删除</a>
								</div>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>时间：</b>
						</div>
						<div class="col-xs-9">
							<input type="text" data="time" placeholder="选择时间" class="calendar form-control datetimepicker">
						</div>
					</div>
				</div>
				<div class="col-xs-12 m-t-25">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>内容：</b>
						</div>
						<div class="col-xs-10">
							<textarea data="content"  rows="" cols="" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<p class="col-xs-12 text-right m-t-25 m-b-20">
					<button type="button" course_type="3" tag="sqlc" class="btn btn-blue m-r-30">提交</button>
				</p>
			</div>
			<div class="row case-edit-formwidth p-l-0 p-r-0 case-edit-licheng">
				<h5 class="color-blue">4. 关键支持</h5>
				<div class="col-xs-12 color-gray m-b-20 ghfa">
					<?php foreach($courseArr as $key => $value): ?>
						<?php if($value['type'] == 4): ?>
							<div class="row" id="row_<?= $value['course_id']; ?>">
								<div class="col-xs-3 text-right p-r-0">
									<?= date("Y-m-d", strtotime($value['dates'])); ?>
								</div>
								<div class="col-xs-9">
									<?= $value['content'] ?>
								</div>
								<div class="col-xs-3 text-left p-r-0">
									<a href="#" data-toggle="modal" data-target="#edit_<?= $value['course_id']; ?>" >编辑</a> | <a href="javascript:void(0);" class="delete" data-id="<?= $value['course_id']; ?>">删除</a>
								</div>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>时间：</b>
						</div>
						<div class="col-xs-9">
							<input type="text" data="time" placeholder="选择时间" class="calendar form-control datetimepicker">
						</div>
					</div>
				</div>
				<div class="col-xs-12 m-t-25">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>内容：</b>
						</div>
						<div class="col-xs-10">
							<textarea data="content" rows="" cols="" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<p class="col-xs-12 text-right m-t-25 m-b-20">
					<button type="button" course_type="4" tag="sqlc" class="btn btn-blue m-r-30">提交</button>
				</p>
			</div>
			<div class="row case-edit-formwidth p-l-0 p-r-0 case-edit-licheng">
				<h5 class="color-blue">5. 网申结果</h5>
				<div class="col-xs-12 color-gray m-b-20 ghfa">
					<?php foreach($courseArr as $key => $value): ?>
						<?php if($value['type'] == 5): ?>
							<div class="row" id="row_<?= $value['course_id']; ?>">
								<div class="col-xs-3 text-right p-r-0">
									<?= date("Y-m-d", strtotime($value['dates'])); ?>
								</div>
								<div class="col-xs-9">
									<?= $value['content'] ?>
								</div>
								<div class="col-xs-3 text-left p-r-0">
									<a href="#" data-toggle="modal" data-target="#edit_<?= $value['course_id']; ?>" >编辑</a> | <a href="javascript:void(0);" class="delete" data-id="<?= $value['course_id']; ?>">删除</a>
								</div>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>时间：</b>
						</div>
						<div class="col-xs-9">
							<input type="text" data="time" placeholder="选择时间" class="calendar form-control datetimepicker">
						</div>
					</div>
				</div>
				<div class="col-xs-12 m-t-25">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>内容：</b>
						</div>
						<div class="col-xs-10">
							<textarea data="content" rows="" cols="" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<p class="col-xs-12 text-right m-t-25 m-b-20">
					<button type="button" course_type="5" tag="sqlc" class="btn btn-blue m-r-30">提交</button>
				</p>
			</div>
			<hr />
		</div>
		<div class="case-edit-cont">
			<h4 class="text-center m-b-20">专家点评</h4>
			<div class="row case-edit-formwidth">
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>选择专家：</b>
						</div>
						<div class="col-xs-9">
							<?= $form->field($expertCommentModel, "expert_id")->dropDownList(\common\models\Expert::getExperts())->label(false); ?>
						</div>
					</div>
				</div>
			</div>

			<div class="row case-edit-formwidth">
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>音频文件</b>
						</div>

						<div class="col-xs-9">
							<?php if($expertCommentModel->video != ""): ?>
								<audio id="expert_comment" src="<?= Url::to($expertCommentModel->video); ?>" controls="controls" preload="auto" class="audio-style m-l-10"> </audio>
							<?php endif; ?>
							<?= $form->field($expertCommentModel, 'video')->fileInput()->label(false); ?>
							<p class="p-t-5 m-b-0"><small class="color-red">文件大小不超过10G，支持mp3.mp4.m4a格式</small></p>
						</div>
					</div>
				</div>
			</div>
			<div class="row case-edit-formwidth">
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>音频语言：</b>
						</div>
						<div class="col-xs-9">
							<?= $form->field($expertCommentModel, 'language')->dropDownList([ 2 => '英文', 1 => '中文', ])->label(false); ?>
						</div>
					</div>
				</div>
			</div>
			<hr />
			<div class="row text-center">
				<button class="btn btn-blue btn-lg p-l-20 p-r-20" type="submit">生成案例</button>
			</div>
		</div>
	</div>
</div>
<?php ActiveForm::end(); ?>

<!-- 申请历程开始-编辑 -->
<?php foreach($courseArr as $key => $value): ?>
	<div class="modal" tabindex="-1" role="dialog" id="edit_<?= $value['course_id'] ?>">
		<input type="hidden" name="Course[course_id]" value="<?= $value['course_id']; ?>" >
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h5 class="modal-title color-blue">申请历程-<?= \common\models\Course::dropDown($value['type']); ?>编辑</h5>
				</div>
				<div class="modal-body">
					<form class="form-horizontal">
						<div class="form-group">
							<label for="name" class="col-xs-3 control-label color-8b">时间</label>
							<div class="col-xs-9 p-l-5">
								<input type="text" name="Course[dates]" class="form-control" value="<?= $value['dates'] ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="xingbie" class="col-xs-3 control-label color-8b">内容</label>
							<div class="col-xs-9 p-l-5">
								<div class="radio radio-style">
									<textarea name="Course[content]" cols="26" rows="5"><?= $value['content']; ?></textarea>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" type="edit" class="btn btn-blue edit tt">完成</button>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<!-- 申请历程结束-编辑 -->

<?php
$csrfToken = Yii::$app->request->csrfToken;
$js = <<<JS
	var user_id = '{$caseModel['user_id']}';
	var case_id = '{$caseModel['case_id']}';
	$("button[tag='sqlc']").click(function(){
		var time = $(this).parents(".case-edit-formwidth").find("input[data='time']").val();
		var content = $(this).parents(".case-edit-formwidth").find("textarea[data='content']").val();
		var type = $(this).attr("course_type");
		var url = "/course/add?user_id=" + user_id + "&case_id=" + case_id + "&type=" + type + "&dates=" + time + "&content=" + content;
		var obj = $(this).parents(".case-edit-formwidth");
		$.get(url, function(re){
			var data = eval("(" + re + ")");
			if(data.code == 200){
				time = time.substring(0, 10);
				obj.find(".ghfa").append('<div class="row"> <div class="col-xs-3 text-right p-r-0"> ' + time + ' </div> <div class="col-xs-9"> ' + content +' </div> <div class="col-xs-3 text-left p-r-0"> <a href="#" data-toggle="modal" data-target="#edit_' + data.course_id +']; ?>" >编辑</a> | <a href="javascript:void(0);" class="delete" data-id="' + data.course_id + '">删除</a></div> </div>');
				obj.find("input[data='time']").val('');
				obj.find("textarea[data='content']").val('');
				layer.open({
					title:'提示信息',
					content:'添加成功'
				});
			}else{
				layer.open({
					title:'警告信息',
					content:data.error
				});
			}
		});
	});

	$('.datetimepicker').datetimepicker({
		todayBtn : true,
		minView : 2,
		autoclose : true
	});

	$(".delete").click(function(){
		var obj = $(this);
		var course_id = $(this).attr("data-id");
		var csrf_token = "{$csrfToken}";
		$.post("/course/delete", {id:course_id,'_csrf-backend':csrf_token}, function(re){
			data = eval('(' + re + ')');
			if(data.code == 200){
				layer.open({
					title:'成功提示',
					content:'删除成功'
				});
				$("#row_" + course_id).empty();
			}else{
				layer.open({
					title:'失败提示',
					content:'删除失败，请联系管理员'
				});
			}
		});
	});

	$(".tt").click(function(){
		var csrf_token = "{$csrfToken}";
		var obj = $(this).parents(".modal");
		var course_id = $(obj).find("input[name='Course[course_id]']").val();
		console.log(course_id);
		var dates = $(obj).find("input[name='Course[dates]']").val();
		var content = $(obj).find("textarea[name='Course[content]']").val();
		$.post("/course/update", {id:course_id, dates:dates, content:content, '_csrf-backend':csrf_token}, function(re){
			var data = eval('(' + re + ')');
			if(data.code == 200){
				layer.open({
					title:'成功提示',
					content:'更新成功'
				});
				dates = dates.substring(0, 10);
				$("#row_" + course_id).html('<div class="col-xs-3 text-right p-r-0"> '+ dates +' </div> <div class="col-xs-9"> ' + content +' </div><div class="col-xs-3 text-left p-r-0"> <a href="#" data-toggle="modal" data-target="#edit_' + course_id +']; ?>" >编辑</a> | <a href="javascript:void(0);" class="delete" data-id="' + course_id + '">删除</a></div>');
			}else{
				layer.open({
					title:'失败提示',
					content:'更新失败'
				});
			}
		});
		$("#edit_" + course_id).modal("toggle");
	});
JS;

$this->registerJs($js);
?>
