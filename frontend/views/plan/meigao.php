<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/10/26
 * Time: 下午10:26
 */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "留学规划";
?>
<style>
	.form-group{margin-bottom: 10px;}
</style>
<div class="container">
	<h2 class="text-center m-t-30">留学规划</h2>
	<hr class="cont-tit-border" />
	<div class="row step-style">
		<div class="col-xs-2 text-center">
			<span class="red-circle">
				1
			</span>
			<h4 class="color-red">填写信息</h4>
		</div>
		<div class="col-xs-3">
			<p class="gray-line"></p>
		</div>
		<div class="col-xs-2 text-center">
			<span class="blue-circle">
				2
			</span>
			<h4 class="color-blue">支付费用</h4>
		</div>
		<div class="col-xs-3">
			<p class="gray-line"></p>
		</div>
		<div class="col-xs-2 text-center">
			<span class="blue-circle">
				3
			</span>
			<h4 class="color-blue">查看方案</h4>
		</div>
	</div>
	<div class="border-color p-20 m-t-50">
		<p style="margin-left: 20px;"><span class="color-red">注</span>：为了确保规划方案更加精准，请您根据自己的真实情况填写下列信息。</p>
		<div class="p-20">
			<?php $form = ActiveForm::begin([
				'action' => ['plan/meigao'],
				'method' => 'post',
				'options' => [
					'class' => "form-horizontal edit_label",
				],
			]); ?>
				<div class="form-group m-b-20">
					<div class="col-xs-6">
						<label for="input3" class="col-xs-3 control-label"><b class="color-red">*</b> 申请类别</label>
						<div class="col-xs-9 tab-btn-style">
							<ul id="myTabs" class="nav nav-tabs" role="tablist">
								<li>
									<a href="<?= Url::to(['plan/meiben']); ?>" class="btn btn-sm btn-primary">美本</a>
								</li>
								<li class="active">
									<a href="#" class="btn btn-sm btn-primary">美高</a>
								</li>
								<li>
									<a href="<?= Url::to(['plan/meiyan']); ?>" class="btn btn-sm btn-primary">美研</a>
								</li>
								<li>
									<a href="<?= Url::to(['plan/emba']); ?>" class="btn btn-sm btn-primary">MBA/EMBA</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active">
						<div class="form-group m-b-20">
							<div class="col-xs-6">
								<label for="input1" class="col-xs-3 control-label"><b class="color-red">*</b> 姓名</label>
								<div class="col-xs-9">
									<?= $form->field($model, 'username')->textInput(['class' => 'form-control', 'id' => 'input1', 'placeholder' => '点击填写您的姓名'])->label(false); ?>
<!--									<input type="text" class="form-control" id="input1" placeholder="点击填写您的姓名">-->
								</div>
							</div>
							<div class="col-xs-6">
								<label for="input2" class="col-xs-3 control-label"><b class="color-red">*</b> 手机号</label>
								<div class="col-xs-9">
									<?= $form->field($model, 'phone')->textInput(['class' => 'form-control', 'id' => 'input2', 'placeholder' => '点击填写您的手机号'])->label(false); ?>
<!--									<input type="text" class="form-control" id="input2" placeholder="点击填写您的手机号">-->
								</div>
							</div>
						</div>
						<div class="form-group m-b-20">
							<div class="col-xs-6">
								<label for="input3" class="col-xs-3 control-label">微信</label>
								<div class="col-xs-9">
									<?= $form->field($model, 'weixin')->textInput(['class' => 'form-control', 'id' => 'input3', 'placeholder' => '点击填写您的微信账户'])->label(false); ?>
<!--									<input type="text" class="form-control" id="input3" placeholder="点击填写您的微信账户">-->
								</div>
							</div>
							<div class="col-xs-6">
								<label for="input4" class="col-xs-3 control-label"><b class="color-red">*</b> 邮箱</label>
								<div class="col-xs-9">
									<?= $form->field($model, 'email')->textInput(['class' => 'form-control', 'id' => 'input4', 'placeholder' => '点击填写您的电子邮箱'])->label(false); ?>
<!--									<input type="text" class="form-control" id="input4" placeholder="点击填写您的电子邮箱">-->
								</div>
							</div>
						</div>
						<div class="form-group m-b-20">
							<div class="col-xs-6">
								<label for="input5" class="col-xs-3 control-label"><b class="color-red">*</b> 就读学校</label>
								<div class="col-xs-9">
									<?= $form->field($model, 'currentSchool')->textInput(['class' => 'form-control', 'id' => 'input5', 'placeholder' => '点击填写您的就读学校'])->label(false); ?>
<!--									<input type="text" class="form-control" id="input5" placeholder="点击填写您的就读学校">-->
								</div>
							</div>
							<div class="col-xs-6">
								<label for="input6" class="col-xs-3 control-label"><b class="color-red">*</b> 就读年级</label>
								<div class="col-xs-9">
									<?= $form->field($model, 'grade')->textInput(['class' => 'form-control', 'id' => 'input6', 'placeholder' => '点击填写您的就读年级'])->label(false); ?>
<!--									<input type="text" class="form-control" id="input6" placeholder="点击填写您的就读年级">-->
								</div>
							</div>
						</div>

						<hr class="m-b-30 m-t-30" />
						<p><span class="color-red">注</span>：若无相关成绩信息，可填写预估成绩。</p>
						<hr class="m-b-30 m-t-30" />

						<div class="form-group m-b-20">
							<div class="col-xs-6">
								<label for="input7" class="col-xs-3 control-label">TOFEL</label>
								<div class="col-xs-9">
									<?= $form->field($model, 'toefl')->textInput(['class' => 'form-control', 'id' => 'input7', 'placeholder' => '点击填写您的TOEFL成绩'])->label(false); ?>
								</div>
							</div>
							<div class="col-xs-6">
								<label for="input8" class="col-xs-3 control-label">雅思</label>
								<div class="col-xs-9">
									<?= $form->field($model, 'ielts')->textInput(['class' => 'form-control', 'id' => 'input8', 'placeholder' => '点击填写您的雅思成绩'])->label(false); ?>
								</div>
							</div>
						</div>
						<div class="form-group m-b-20">
							<div class="col-xs-6">
								<label for="input5" class="col-xs-3 control-label"> SSAT</label>
								<div class="col-xs-9">
									<?= $form->field($model, 'ssat')->textInput(['class' => 'form-control', 'id' => 'input9', 'placeholder' => '点击填写您的SSAT成绩'])->label(false); ?>
<!--									<input type="text" class="form-control" id="input5" placeholder="点击填写您的SSAT成绩">-->
								</div>
							</div>

							<div class="col-xs-6">
								<label for="input5" class="col-xs-3 control-label"> 初中GPA</label>
								<div class="col-xs-9">
									<?= $form->field($model, 'gpa_m')->textInput(['class' => 'form-control', 'id' => 'input10', 'placeholder' => '点击填写您的GPA成绩'])->label(false); ?>
								</div>
							</div>
						</div>
						<hr class="m-b-30 m-t-30" />
						<div class="form-group m-b-20 plan-edit-textarea-label">
							<div class="col-xs-12">
								<label for="input13" class="col-xs-3 control-label"> 获奖情况</label>
								<div class="col-xs-9 p-t-5">
									<?= $form->field($model, "winning")->textarea(['class' => 'form-control', 'rows' => 5, 'placeholder' => '写明您的获奖情况'])->label(false); ?>
<!--									<textarea class="form-control" rows="5" placeholder="写明您的获奖情况"></textarea>-->
								</div>
							</div>
						</div>
						<div class="form-group m-b-20 plan-edit-textarea-label">
							<div class="col-xs-12">
								<label for="input14" class="col-xs-3 control-label"> 社团活动</label>
								<div class="col-xs-9 p-t-5">
									<?= $form->field($model, "communityActivities")->textarea(['class' => 'form-control', 'rows' => 5, 'placeholder' => '写明您参加过的社团活动'])->label(false); ?>
<!--									<textarea class="form-control" rows="5" placeholder="写明您参加过的社团活动"></textarea>-->
								</div>
							</div>
						</div>
						<div class="form-group m-b-20 plan-edit-textarea-label">
							<div class="col-xs-12">
								<label for="input15" class="col-xs-3 control-label"> 公益活动</label>
								<div class="col-xs-9 p-t-5">
									<?= $form->field($model, "publicBenefitActivities")->textarea(['class' => 'form-control', 'rows' => 5, 'placeholder' => '写明您参加过得公益活动'])->label(false); ?>
<!--									<textarea class="form-control" rows="5" placeholder="写明您参加过的公益活动"></textarea>-->
								</div>
							</div>
						</div>
						<div class="form-group m-b-20 plan-edit-textarea-label">
							<div class="col-xs-12">
								<label for="input15" class="col-xs-3 control-label"> 学术活动</label>
								<div class="col-xs-9 p-t-5">
									<?= $form->field($model, "relatives")->textarea(['class' => 'form-control', 'rows' => 5, 'placeholder' => '如有，写明入学时间、学校名称和所学专业'])->label(false); ?>
<!--									<textarea class="form-control" rows="5" placeholder="写明您参加过的学术活动"></textarea>-->
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
	<div class="text-center m-t-50">
		<?= Html::submitButton("提交信息", ['class' => 'btn btn-blue btn-big-size btn-lg']) ?>
	</div>
	<?php ActiveForm::end(); ?>
</div>