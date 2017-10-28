<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/10/25
 * Time: 下午11:38
 */
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = "留学规划";

?>

<div class="container">
	<h2 class="text-center m-t-30">留学规划</h2>
	<hr class="cont-tit-border" />
	<div class="row step-style">
		<div class="col-xs-2 text-center">
			<span class="red-circle">1</span>
			<h4 class="color-red">填写信息</h4>
		</div>
		<div class="col-xs-3">
			<p class="gray-line"></p>
		</div>
		<div class="col-xs-2 text-center">
			<span class="blue-circle">2</span>
			<h4 class="color-blue">支付费用</h4>
		</div>
		<div class="col-xs-3">
			<p class="gray-line"></p>
		</div>
		<div class="col-xs-2 text-center">
			<span class="blue-circle">3</span>
			<h4 class="color-blue">查看方案</h4>
		</div>
	</div>
	<div class="border-color p-20 m-t-50">
		<p><span class="color-red">注</span>：为了确保规划方案更加精准，请您根据自己的真实情况填写下列信息。</p>
		<div class="p-20">
			<div class="form-group m-b-20">
				<div class="col-xs-6">
					<label for="input3" class="col-xs-3 control-label"><b class="color-red">*</b> 申请类别</label>
					<div class="col-xs-9 tab-btn-style">
						<ul id="myTabs" class="nav nav-tabs" role="tablist">
							<li class="active" formId="university">
								<a href="#meiben" role="tab" data-toggle="tab" class="btn btn-sm btn-primary">美本</a>
							</li>
							<li formId="highSchool">
								<a href="#meigao" role="tab" data-toggle="tab" class="btn btn-sm btn-primary">美高</a>
							</li>
							<li formId="master">
								<a href="#meiyan" role="tab" data-toggle="tab" class="btn btn-sm btn-primary">美研</a>
							</li>
							<li formId="mba_emba">
								<a href="#emba" role="tab" data-toggle="tab" class="btn btn-sm btn-primary">MBA/EMBA</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<?php $form = ActiveForm::begin([
				'action' => ['plan/edit'],
				'method' => 'post',
				'options' => ['class' => 'form-horizontal edit_label', "id"=>'university'],
			]); ?>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="meiben">
					<div class="form-group m-b-20">
						<div class="col-xs-6">
							<label for="input1" class="col-xs-3 control-label"><b class="color-red">*</b> 姓名</label>
							<div class="col-xs-9">
								<?= $form->field($model, "user_id")->hiddenInput(['value'=>Yii::$app->user->getId()])->label(false); ?>
								<?= $form->field($model, "applicationProject")->hiddenInput(['value'=> '2'])->label(false); ?>
								<?= $form->field($model, "username")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的姓名'])->label(false); ?>
<!--									<input type="text" class="form-control" id="input1" placeholder="点击填写您的姓名">-->
							</div>
						</div>
						<div class="col-xs-6">
							<label for="input2" class="col-xs-3 control-label"><b class="color-red">*</b> 手机号</label>
							<div class="col-xs-9">
								<?= $form->field($model, "phone")->textInput(["class" => "form-control","placeholder"=>"点击填写您的手机号"])->label(false); ?>
<!--									<input type="text" class="form-control" id="input2" placeholder="点击填写您的手机号">-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20">
						<div class="col-xs-6">
							<label for="input3" class="col-xs-3 control-label">微信</label>
							<div class="col-xs-9">
								<?= $form->field($model, "weixin")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的微信账户'])->label(false); ?>
<!--									<input type="text" class="form-control" id="input3" placeholder="点击填写您的微信账户">-->
							</div>
						</div>
						<div class="col-xs-6">
							<label for="input4" class="col-xs-3 control-label"><b class="color-red">*</b> 邮箱</label>
							<div class="col-xs-9">
								<?= $form->field($model, "email")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的电子邮箱'])->label(false); ?>
<!--									<input type="text" class="form-control" id="input4" placeholder="点击填写您的电子邮箱">-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20">
						<div class="col-xs-6">
							<label for="input5" class="col-xs-3 control-label"><b class="color-red">*</b> 就读学校</label>
							<div class="col-xs-9">
								<?= $form->field($model, "currentSchool")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的就读学校'])->label(false); ?>
<!--									<input type="text" class="form-control" id="input5" placeholder="点击填写您的就读学校">-->
							</div>
						</div>
						<div class="col-xs-6">
							<label for="input6" class="col-xs-3 control-label"><b class="color-red">*</b> 就读年级</label>
							<div class="col-xs-9">
								<?= $form->field($model, "grade")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的就读年级'])->label(false); ?>
<!--									<input type="text" class="form-control" id="input6" placeholder="点击填写您的就读年级">-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20">
						<div class="col-xs-12 p-l-25">
							<label for="input7" class="col-xs-2 control-label">
								<b class="color-red">*</b> TOFEL
							</label>
							<div class="col-xs-4 p-0">
								<?= $form->field($model, "toefl")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的TOFEL成绩'])->label(false); ?>
<!--									<input type="text" class="form-control" id="input7" placeholder="点击填写您的TOFEL成绩">-->
							</div>
							<label for="input8" class="col-xs-2 control-label">
								<b class="color-red m-r-10">或</b> 雅思
							</label>
							<div class="col-xs-4 p-0">
								<?= $form->field($model, "ielts")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的雅思成绩'])->label(false); ?>
<!--									<input type="text" class="form-control" id="input8" placeholder="点击填写您的雅思成绩">-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20">
						<div class="col-xs-12 p-l-25">
							<label for="input9" class="col-xs-2 control-label">
								<b class="color-red">*</b> SAT
							</label>
							<div class="col-xs-4 p-0">
								<?= $form->field($model, "sat")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的SAT成绩'])->label(false); ?>
<!--									<input type="text" class="form-control" id="input9" placeholder="点击填写您的SAT成绩">-->
							</div>
							<label for="input10" class="col-xs-2 control-label">
								<b class="color-red m-r-10">或</b> ACT
							</label>
							<div class="col-xs-4 p-0">
								<?= $form->field($model, "act")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的ACT成绩'])->label(false); ?>
<!--									<input type="text" class="form-control" id="input10" placeholder="点击填写你的ACT成绩">-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20">
						<div class="col-xs-6">
							<label for="input11" class="col-xs-3 control-label">高中GPA</label>
							<div class="col-xs-9">
								<?= $form->field($model, "gpa_h")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的高中GPA'])->label(false); ?>
<!--									<input type="text" class="form-control" id="input11" placeholder="点击填写您的高中GPA">-->
							</div>
						</div>
						<div class="col-xs-6">
							<label for="input12" class="col-xs-3 control-label">AP课程数量</label>
							<div class="col-xs-9">
								<?= $form->field($model, "ap")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的AP课程数量'])->label(false); ?>
<!--									<input type="text" class="form-control" id="input12" placeholder="点击填写您的AP课程数量">-->
							</div>
						</div>
					</div>
					<hr class="m-b-30 m-t-30" />
					<div class="form-group m-b-20 plan-edit-textarea-label">
						<div class="col-xs-12">
							<label for="input13" class="col-xs-3 control-label"> 获奖情况</label>
							<div class="col-xs-9 p-t-5">
								<?= $form->field($model, "winning")->textarea(['class' => 'form-control', 'placeholder' => '写明您的获奖情况', 'rows' => 5])->label(false); ?>
<!--									<textarea class="form-control" rows="5" placeholder="写明您的获奖情况"></textarea>-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20 plan-edit-textarea-label">
						<div class="col-xs-12">
							<label for="input14" class="col-xs-3 control-label"> 社团活动</label>
							<div class="col-xs-9 p-t-5">
								<?= $form->field($model, "communityActivities")->textarea(['class' => 'form-control', 'placeholder' => '写明您参加过得社团活动', 'rows' => 5])->label(false); ?>
<!--									<textarea class="form-control" rows="5" placeholder="写明您参加过得社团活动"></textarea>-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20 plan-edit-textarea-label">
						<div class="col-xs-12">
							<label for="input15" class="col-xs-3 control-label"> 公益活动</label>
							<div class="col-xs-9 p-t-5">
								<?= $form->field($model, "publicBenefitActivities")->textarea(['class' => 'form-control', 'placeholder' => '写明您参加过得公益活动', 'rows' => 5])->label(false); ?>
<!--									<textarea class="form-control" rows="5" placeholder="写明您参加过得公益活动"></textarea>-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20 plan-edit-textarea-label">
						<div class="col-xs-12">
							<label for="input15" class="col-xs-3 control-label"> 直系亲属是否<br />美国大学毕业</label>
							<div class="col-xs-9 p-t-5">
								<?= $form->field($model, "relatives")->textarea(['class' => 'form-control', 'placeholder' => '如有，写明入学时间、学校名称和所学专业', 'rows' => 5])->label(false); ?>
<!--									<textarea class="form-control" rows="5" placeholder="如有，写明入学时间、学校名称和所学专业"></textarea>-->
							</div>
						</div>
					</div>
				</div>
				<?php ActiveForm::end(); ?>
				<div role="tabpanel" class="tab-pane fade" id="meigao">
					<?php $form = ActiveForm::begin([
						'action' => ['plan/edit'],
						'method' => 'post',
						'options' => ['class' => 'form-horizontal edit_label', "id"=>'highSchool'],
					]); ?>
					<div class="form-group m-b-20">
						<div class="col-xs-6">
							<label for="input1" class="col-xs-3 control-label"><b class="color-red">*</b> 姓名</label>
							<div class="col-xs-9">
								<?= $form->field($model, "user_id")->hiddenInput(['value'=>Yii::$app->user->getId()])->label(false); ?>
								<?= $form->field($model, "applicationProject")->hiddenInput(['value'=> '1'])->label(false); ?>
								<?= $form->field($model, "username")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的姓名'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input1" placeholder="点击填写您的姓名">-->
							</div>
						</div>
						<div class="col-xs-6">
							<label for="input2" class="col-xs-3 control-label"><b class="color-red">*</b> 手机号</label>
							<div class="col-xs-9">
								<?= $form->field($model, "phone")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的手机号'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input2" placeholder="点击填写您的手机号">-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20">
						<div class="col-xs-6">
							<label for="input3" class="col-xs-3 control-label">微信</label>
							<div class="col-xs-9">
								<?= $form->field($model, "weixin")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的微信账号'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input3" placeholder="点击填写您的微信账户">-->
							</div>
						</div>
						<div class="col-xs-6">
							<label for="input4" class="col-xs-3 control-label"><b class="color-red">*</b> 邮箱</label>
							<div class="col-xs-9">
								<?= $form->field($model, "email")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的电子邮箱'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input4" placeholder="点击填写您的电子邮箱">-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20">
						<div class="col-xs-6">
							<label for="input5" class="col-xs-3 control-label"><b class="color-red">*</b> 就读学校</label>
							<div class="col-xs-9">
								<?= $form->field($model, "currentSchool")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的就读学校'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input5" placeholder="点击填写您的就读学校">-->
							</div>
						</div>
						<div class="col-xs-6">
							<label for="input6" class="col-xs-3 control-label"><b class="color-red">*</b> 就读年级</label>
							<div class="col-xs-9">
								<?= $form->field($model, "grade")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的就读年级'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input6" placeholder="点击填写您的就读年级">-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20">
						<div class="col-xs-12 p-l-25">
							<label for="input7" class="col-xs-2 control-label">
								<b class="color-red">*</b> TOFEL
							</label>
							<div class="col-xs-4 p-0">
								<?= $form->field($model, "toefl")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的TOEFL成绩'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input7" placeholder="点击填写您的TOFEL成绩">-->
							</div>
							<label for="input8" class="col-xs-2 control-label">
								<b class="color-red m-r-10">或</b> 雅思
							</label>
							<div class="col-xs-4 p-0">
								<?= $form->field($model, "ielts")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的雅思成绩'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input8" placeholder="点击填写您的雅思成绩">-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20">
						<div class="col-xs-6">
							<label for="input5" class="col-xs-3 control-label"><b class="color-red">*</b> SSAT</label>
							<div class="col-xs-9">
								<?= $form->field($model, "ssat")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的SSAT成绩'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input5" placeholder="点击填写您的SSAT成绩">-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20">
						<div class="col-xs-6">
							<label for="input5" class="col-xs-3 control-label"><b class="color-red">*</b> 初中GPA</label>
							<div class="col-xs-9">
								<?= $form->field($model, "gpa_m")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的GPA成绩'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input5" placeholder="点击填写您的GPA">-->
							</div>
						</div>
					</div>
					<hr class="m-b-30 m-t-30" />
					<div class="form-group m-b-20 plan-edit-textarea-label">
						<div class="col-xs-12">
							<label for="input13" class="col-xs-3 control-label"> 获奖情况</label>
							<div class="col-xs-9 p-t-5">
								<?= $form->field($model, "winning")->textarea(['class' => 'form-control', 'placeholder' => '写明您的获奖情况', 'rows' => 5])->label(false); ?>
<!--								<textarea class="form-control" rows="5" placeholder="写明您的获奖情况"></textarea>-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20 plan-edit-textarea-label">
						<div class="col-xs-12">
							<label for="input14" class="col-xs-3 control-label"> 社团活动</label>
							<div class="col-xs-9 p-t-5">
								<?= $form->field($model, "communityActivities")->textarea(['class' => 'form-control', 'placeholder' => '写明您参加过的社团活动', 'rows' => 5])->label(false); ?>
<!--								<textarea class="form-control" rows="5" placeholder="写明您参加过的社团活动"></textarea>-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20 plan-edit-textarea-label">
						<div class="col-xs-12">
							<label for="input15" class="col-xs-3 control-label"> 公益活动</label>
							<div class="col-xs-9 p-t-5">
								<?= $form->field($model, "publicBenefitActivities")->textarea(['class' => 'form-control', 'placeholder' => '写明您参加过的公益活动', 'rows' => 5])->label(false); ?>
<!--								<textarea class="form-control" rows="5" placeholder="写明您参加过的公益活动"></textarea>-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20 plan-edit-textarea-label">
						<div class="col-xs-12">
							<label for="input15" class="col-xs-3 control-label"> 学术活动</label>
							<div class="col-xs-9 p-t-5">
								<?= $form->field($model, "academicActivities")->textarea(['class' => 'form-control', 'placeholder' => '写明您参加过的学术活动', 'rows' => 5])->label(false); ?>
<!--								<textarea class="form-control" rows="5" placeholder="写明您参加过的学术活动"></textarea>-->
							</div>
						</div>
					</div>
					<?php ActiveForm::end(); ?>
				</div>


				<div role="tabpanel" class="tab-pane fade" id="meiyan">
					<?php $form = ActiveForm::begin([
						'action' => ['plan/edit'],
						'method' => 'post',
						'options' => ['class' => 'form-horizontal edit_label', "id"=>'master'],
					]); ?>
					<div class="form-group m-b-20">
						<div class="col-xs-6">
							<label for="input1" class="col-xs-3 control-label"><b class="color-red">*</b> 姓名</label>
							<div class="col-xs-9">
								<?= $form->field($model, "user_id")->hiddenInput(['value'=>Yii::$app->user->getId()])->label(false); ?>
								<?= $form->field($model, "applicationProject")->hiddenInput(['value'=> '3'])->label(false); ?>
								<?= $form->field($model, "username")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的姓名'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input1" placeholder="点击填写您的姓名">-->
							</div>
						</div>
						<div class="col-xs-6">
							<label for="input2" class="col-xs-3 control-label"><b class="color-red">*</b> 手机号</label>
							<div class="col-xs-9">
								<?= $form->field($model, "phone")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的手机号'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input2" placeholder="点击填写您的手机号">-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20">
						<div class="col-xs-6">
							<label for="input3" class="col-xs-3 control-label">微信</label>
							<div class="col-xs-9">
								<?= $form->field($model, "weixin")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的微信账号'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input3" placeholder="点击填写您的微信账户">-->
							</div>
						</div>
						<div class="col-xs-6">
							<label for="input4" class="col-xs-3 control-label"><b class="color-red">*</b> 邮箱</label>
							<div class="col-xs-9">
								<?= $form->field($model, "email")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的电子邮箱'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input4" placeholder="点击填写您的电子邮箱">-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20">
						<div class="col-xs-6">
							<label for="input5" class="col-xs-3 control-label"><b class="color-red">*</b> 就读学校</label>
							<div class="col-xs-9">
								<?= $form->field($model, "currentSchool")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的就读学校'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input5" placeholder="点击填写您的就读学校">-->
							</div>
						</div>
						<div class="col-xs-6">
							<label for="input6" class="col-xs-3 control-label"><b class="color-red">*</b> 就读年级</label>
							<div class="col-xs-9">
								<?= $form->field($model, "grade")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的就读年级'])->label(false); ?>
								<input type="text" class="form-control" id="input6" placeholder="点击填写您的就读年级">
							</div>
						</div>
					</div>
					<div class="form-group m-b-20">
						<div class="col-xs-12 p-l-25">
							<label for="input7" class="col-xs-2 control-label">
								<b class="color-red">*</b> TOFEL
							</label>
							<div class="col-xs-4 p-0">
								<?= $form->field($model, "toefl")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的TOEFL成绩'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input7" placeholder="点击填写您的TOFEL成绩">-->
							</div>
							<label for="input8" class="col-xs-2 control-label">
								<b class="color-red m-r-10">或</b> 雅思
							</label>
							<div class="col-xs-4 p-0">
								<?= $form->field($model, "ielts")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的雅思成绩'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input8" placeholder="点击填写您的雅思成绩">-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20">
						<div class="col-xs-12 p-l-25">
							<label for="input9" class="col-xs-2 control-label">
								<b class="color-red">*</b> GRE
							</label>
							<div class="col-xs-4 p-0">
								<?= $form->field($model, "gre")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的GRE成绩'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input9" placeholder="点击填写您的GRE成绩">-->
							</div>
							<label for="input10" class="col-xs-2 control-label">
								<b class="color-red m-r-5">或</b> GMAT
							</label>
							<div class="col-xs-4 p-0">
								<?= $form->field($model, "gmat")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的GMAT成绩'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input10" placeholder="点击填写你的GMAT成绩">-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20">
						<div class="col-xs-6">
							<label for="input11" class="col-xs-3 control-label"><b class="color-red">*</b> 大学GPA</label>
							<div class="col-xs-9">
								<?= $form->field($model, "gpa_u")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的大学GPA'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input11" placeholder="点击填写您的大学GPA">-->
							</div>
						</div>
						<div class="col-xs-6">
							<label for="input11" class="col-xs-3 control-label p-l-10"><b class="color-red">*</b> 专业课GPA</label>
							<div class="col-xs-9">
								<?= $form->field($model, "gpa_major")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的专业课GPA'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input11" placeholder="点击填写您的专业课GPA">-->
							</div>
						</div>
					</div>
					<hr class="m-b-30 m-t-30" />
					<div class="form-group m-b-20 plan-edit-textarea-label">
						<div class="col-xs-12">
							<label for="input13" class="col-xs-3 control-label"> 获奖情况</label>
							<div class="col-xs-9 p-t-5">
								<?= $form->field($model, "winning")->textarea(['class' => 'form-control', 'placeholder' => '写明您的获奖情况', 'rows' => 5])->label(false); ?>
<!--								<textarea class="form-control" rows="5" placeholder="写明您的获奖情况"></textarea>-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20 plan-edit-textarea-label">
						<div class="col-xs-12">
							<label for="input14" class="col-xs-3 control-label"> 社团活动</label>
							<div class="col-xs-9 p-t-5">
								<?= $form->field($model, "communityActivities")->textarea(['class' => 'form-control', 'placeholder' => '写明您参加过的社团活动', 'rows' => 5])->label(false); ?>
<!--								<textarea class="form-control" rows="5" placeholder="写明您参加过的社团活动"></textarea>-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20 plan-edit-textarea-label">
						<div class="col-xs-12">
							<label for="input15" class="col-xs-3 control-label"> 公益活动</label>
							<div class="col-xs-9 p-t-5">
								<?= $form->field($model, "publicBenefitActivities")->textarea(['class' => 'form-control', 'placeholder' => '写明您参加过的公益活动', 'rows' => 5])->label(false); ?>
<!--								<textarea class="form-control" rows="5" placeholder="写明您参加过的公益活动"></textarea>-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20 plan-edit-textarea-label">
						<div class="col-xs-12">
							<label for="input15" class="col-xs-3 control-label"> 学术活动</label>
							<div class="col-xs-9 p-t-5">
								<?= $form->field($model, "academicActivities")->textarea(['class' => 'form-control', 'placeholder' => '写明您参加过的学术活动', 'rows' => 5])->label(false); ?>
<!--								<textarea class="form-control" rows="5" placeholder="写明您参加过的学术活动"></textarea>-->
							</div>
						</div>
					</div>
					<?php ActiveForm::end(); ?>
				</div>


				<div role="tabpanel" class="tab-pane" id="emba">
					<?php $form = ActiveForm::begin([
						'action' => ['plan/edit'],
						'method' => 'post',
						'options' => ['class' => 'form-horizontal edit_label', "id"=>'mba_emba'],
					]); ?>
					<div class="form-group m-b-20">
						<div class="col-xs-6">
							<label for="input1" class="col-xs-3 control-label"><b class="color-red">*</b> 姓名</label>
							<div class="col-xs-9">
								<?= $form->field($model, "user_id")->hiddenInput(['value'=>Yii::$app->user->getId()])->label(false); ?>
								<?= $form->field($model, "applicationProject")->hiddenInput(['value'=> '4'])->label(false); ?>
								<?= $form->field($model, "username")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的姓名'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input1" placeholder="点击填写您的姓名">-->
							</div>
						</div>
						<div class="col-xs-6">
							<label for="input2" class="col-xs-3 control-label"><b class="color-red">*</b> 手机号</label>
							<div class="col-xs-9">
								<?= $form->field($model, "phone")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的手机号'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input2" placeholder="点击填写您的手机号">-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20">
						<div class="col-xs-6">
							<label for="input3" class="col-xs-3 control-label">微信</label>
							<div class="col-xs-9">
								<?= $form->field($model, "weixin")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的微信账号'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input3" placeholder="点击填写您的微信账户">-->
							</div>
						</div>
						<div class="col-xs-6">
							<label for="input4" class="col-xs-3 control-label"><b class="color-red">*</b> 邮箱</label>
							<div class="col-xs-9">
								<?= $form->field($model, "email")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的电子邮箱'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input4" placeholder="点击填写您的电子邮箱">-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20">
						<div class="col-xs-6">
							<label for="input5" class="col-xs-3 control-label"><b class="color-red">*</b> 毕业学校</label>
							<div class="col-xs-9">
								<?= $form->field($model, "graduationSchool")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的毕业学校'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input5" placeholder="点击填写您的毕业院校">-->
							</div>
						</div>
						<div class="col-xs-6">
							<label for="input6" class="col-xs-3 control-label"><b class="color-red">*</b> 就读专业</label>
							<div class="col-xs-9">
								<?= $form->field($model, "major")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的就读专业'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input6" placeholder="点击填写您的就读专业">-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20">
						<div class="col-xs-12 p-l-25">
							<label for="input7" class="col-xs-2 control-label">
								<b class="color-red">*</b> TOFEL
							</label>
							<div class="col-xs-4 p-0">
								<?= $form->field($model, "toefl")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的TOEFL成绩'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input7" placeholder="点击填写您的TOFEL成绩">-->
							</div>
							<label for="input8" class="col-xs-2 control-label">
								<b class="color-red m-r-10">或</b> 雅思
							</label>
							<div class="col-xs-4 p-0">
								<?= $form->field($model, "ielts")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的雅思成绩'])->label(false); ?>
<!--								<input type="text" class="form-control" id="input8" placeholder="点击填写您的雅思成绩">-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20">
						<div class="col-xs-6">
							<label for="input11" class="col-xs-3 control-label"><b class="color-red">*</b> 大学GPA</label>
							<div class="col-xs-9">
								<?= $form->field($model, "gpa_u")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的大学GPA'])->label(false); ?>
								<input type="text" class="form-control" id="input11" placeholder="点击填写您的大学GPA">
							</div>
						</div>
						<div class="col-xs-6">
							<label for="input11" class="col-xs-3 control-label p-l-10"><b class="color-red">*</b> 专业课GPA</label>
							<div class="col-xs-9">
								<?= $form->field($model, "major")->textInput(['class' => 'form-control', 'placeholder' => '点击填写您的专业课GPA'])->label(false); ?>
								<input type="text" class="form-control" id="input11" placeholder="点击填写您的专业课GPA">
							</div>
						</div>
					</div>
					<hr class="m-b-30 m-t-30" />
					<div class="form-group m-b-20 plan-edit-textarea-label">
						<div class="col-xs-12">
							<label for="input13" class="col-xs-3 control-label"> 获奖情况</label>
							<div class="col-xs-9 p-t-5">
								<?= $form->field($model, "winning")->textarea(['class' => 'form-control', 'placeholder' => '写明您的获奖情况', 'rows' => 5])->label(false); ?>
<!--								<textarea class="form-control" rows="5" placeholder="写明您的获奖情况"></textarea>-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20 plan-edit-textarea-label">
						<div class="col-xs-12">
							<label for="input14" class="col-xs-3 control-label"> 社团活动</label>
							<div class="col-xs-9 p-t-5">
								<?= $form->field($model, "communityActivities")->textarea(['class' => 'form-control', 'placeholder' => '写明您参加过的社团活动', 'rows' => 5])->label(false); ?>
<!--								<textarea class="form-control" rows="5" placeholder="写明您参加过得社团活动"></textarea>-->
							</div>
						</div>
					</div>
					<div class="form-group m-b-20 plan-edit-textarea-label">
						<div class="col-xs-12">
							<label for="input15" class="col-xs-3 control-label"> 工作经历<br />及职位</label>
							<div class="col-xs-9 p-t-5">
								<?= $form->field($model, "workExperience")->textarea(['class' => 'form-control', 'placeholder' => '写明您工作经历和职位', 'rows' => 5])->label(false); ?>
<!--								<textarea class="form-control" rows="5" placeholder="写明您工作经历及职位"></textarea>-->
							</div>
						</div>
					</div>
					<?php ActiveForm::end(); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="text-center m-t-50">
		<button class="btn btn-blue btn-big-size btn-lg" id="sub">提交信息</button>
	</div>
</div>
<?php
$js=<<<JS
	$("#sub").click(function(){
		var formId = $("#myTabs li[class='active']").attr('formId');
		console.log(formId);
		$("#" + formId).submit();
	});
JS;
$this->registerJs($js);
?>