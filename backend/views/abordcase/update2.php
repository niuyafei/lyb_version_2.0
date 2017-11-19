<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/11/19
 * Time: 上午12:30
 */

use yii\widgets\ActiveForm;
use common\models\AbordCase;

$this->title = "留学案例";
?>
<?php $form = ActiveForm::begin([
	'method' => "post",
	'action' => ['abordcase/update2?case_id=' . $caseModel->case_id]
]); ?>
<div class="col-xs-10">
	<h4 class="color-blue">留学案例 - 编辑</h4>
	<hr class="m-t-5" />
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
									<input type="radio" checked="<?= $caseModel->gender == 1 ? "checked" : ""; ?>" name="gender"> 男
								</label>
								<label class="p-r-15">
									<input type="radio" checked="<?= $caseModel->gender == 1 ? "checked" : ""; ?>" name="gender"> 女
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
				<div class="col-xs-12">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b><span class="color-red">*</span> 特长：</b>
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
							<b><span class="color-red">*</span> 所获奖项：</b>
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
							<b><span class="color-red">*</span> SAT：</b>
						</div>
						<div class="col-xs-9">
							<?= $form->field($caseModel, "sat")->textInput()->label(false); ?>
						</div>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b><span class="color-red">*</span> TOEFL：</b>
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
							<b><span class="color-red">*</span> 雅思：</b>
						</div>
						<div class="col-xs-9">
							<?= $form->field($caseModel, "ielts")->textInput()->label(false); ?>
						</div>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b><span class="color-red">*</span> ACT：</b>
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
							<b><span class="color-red">*</span> GPA：</b>
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
				<div class="col-xs-12 color-gray m-b-20">
					<?php foreach($courseArr as $key => $value): ?>
						<?php if($value['type'] == 1): ?>
							<div class="row">
								<div class="col-xs-3 text-right p-r-0">
									<?= date("Y-m-d", strtotime($value['dates'])); ?>
								</div>
								<div class="col-xs-9">
									<?= $value['content'] ?>
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
							<input type="text" id="calendar1" placeholder="选择时间" class="calendar form-control">
						</div>
					</div>
				</div>
				<div class="col-xs-12 m-t-25">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>内容：</b>
						</div>
						<div class="col-xs-10">
							<textarea name="" rows="" cols="" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<p class="col-xs-12 text-right m-t-25 m-b-20">
					<a href="" class="btn btn-blue m-r-30">+ 新增</a>
				</p>
			</div>
			<div class="row case-edit-formwidth p-l-0 p-r-0 case-edit-licheng">
				<h5 class="color-blue">2. 签订协议</h5>
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>时间：</b>
						</div>
						<div class="col-xs-9">
							<input type="text" id="calendar2" placeholder="选择时间" class="calendar form-control">
						</div>
					</div>
				</div>
				<div class="col-xs-12 m-t-25">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>内容：</b>
						</div>
						<div class="col-xs-10">
							<textarea name="" rows="" cols="" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<p class="col-xs-12 text-right m-t-25 m-b-20">
					<a href="" class="btn btn-blue m-r-30">+ 新增</a>
				</p>
			</div>
			<div class="row case-edit-formwidth p-l-0 p-r-0 case-edit-licheng">
				<h5 class="color-blue">3. 申校名单</h5>
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>时间：</b>
						</div>
						<div class="col-xs-9">
							<input type="text" id="calendar3" placeholder="选择时间" class="calendar form-control">
						</div>
					</div>
				</div>
				<div class="col-xs-12 m-t-25">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>内容：</b>
						</div>
						<div class="col-xs-10">
							<textarea name="" rows="" cols="" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<p class="col-xs-12 text-right m-t-25 m-b-20">
					<a href="" class="btn btn-blue m-r-30">+ 新增</a>
				</p>
			</div>
			<div class="row case-edit-formwidth p-l-0 p-r-0 case-edit-licheng">
				<h5 class="color-blue">4. 关键支持</h5>
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>时间：</b>
						</div>
						<div class="col-xs-9">
							<input type="text" id="calendar4" placeholder="选择时间" class="calendar form-control">
						</div>
					</div>
				</div>
				<div class="col-xs-12 m-t-25">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>内容：</b>
						</div>
						<div class="col-xs-10">
							<textarea name="" rows="" cols="" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<p class="col-xs-12 text-right m-t-25 m-b-20">
					<a href="" class="btn btn-blue m-r-30">+ 新增</a>
				</p>
			</div>
			<div class="row case-edit-formwidth p-l-0 p-r-0 case-edit-licheng">
				<h5 class="color-blue">5. 网申结果</h5>
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>时间：</b>
						</div>
						<div class="col-xs-9">
							<input type="text" id="calendar5" placeholder="选择时间" class="calendar form-control">
						</div>
					</div>
				</div>
				<div class="col-xs-12 m-t-25">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>内容：</b>
						</div>
						<div class="col-xs-10">
							<textarea name="" rows="" cols="" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<p class="col-xs-12 text-right m-t-25 m-b-20">
					<a href="" class="btn btn-blue m-r-30">+ 新增</a>
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
							<input type="text" name="" id="" value="" class="form-control" />
						</div>
					</div>
				</div>
			</div>
			<div class="row case-edit-formwidth">
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-3 text-right p-t-5 p-r-0">
							<b>音频文件：</b>
						</div>
						<div class="col-xs-9">
							<input type="file" name="" id="" value="" class="form-control" />
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
							<select class="form-control">
								<option>英文</option>
								<option>中文</option>

							</select>
						</div>
					</div>
				</div>
			</div>
			<hr />
			<div class="row">
				<div class="col-xs-6 text-right">
					<a href="#" class="btn btn-blue btn-lg p-l-20 p-r-20">本地保存</a>
				</div>
				<div class="col-xs-6">
					<a href="#" class="btn btn-blue btn-lg p-l-20 p-r-20">生成案例</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php ActiveForm::end(); ?>
