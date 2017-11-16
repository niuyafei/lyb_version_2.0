<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/10/28
 * Time: 上午12:56
 */
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = "预约咨询";
?>
<style>
	/*h4{width:75px;}*/
</style>

<div class="container">
	<h2 class="text-center m-t-30">预约咨询</h2>
	<hr class="cont-tit-border" />
	<div class="row step-style">
		<div class="col-xs-2 text-center">
			<span class="red-circle">
				1
			</span>
			<h4 class="color-red">填写信息</h4>
		</div>
		<div class="col-xs-1">
			<p class="gray-line"></p>
		</div>
		<div class="col-xs-2 text-center">
			<span class="blue-circle">
				2
			</span>
			<h4 class="color-blue">支付费用</h4>
		</div>
		<div class="col-xs-1">
			<p class="gray-line"></p>
		</div>
		<div class="col-xs-2 text-center">
			<span class="blue-circle">
				3
			</span>
			<h4 class="color-blue">专家答疑</h4>
		</div>
		<div class="col-xs-1">
			<p class="gray-line"></p>
		</div>
		<div class="col-xs-2 text-center">
			<span class="blue-circle">
				4
			</span>
			<h4 class="color-blue">评价建议</h4>
		</div>
	</div>
	<div class="border-color p-20 m-t-50">
		<p><span class="color-red">注</span>：为了确保规划方案更加精准，请您根据自己的真实情况填写下列信息。</p>
		<?php $form = ActiveForm::begin([
			'action' => ['consultation/myconsultation'],
			'method' => 'post',
			'options' => ['class' => 'form-horizontal'],
		]); ?>
		<div class="p-20">
			<div class="form-group m-b-20">
				<label for="input1" class="col-xs-2 control-label"><b class="color-red">*</b> 姓名</label>
				<div class="col-xs-3" style="height:35px;">
					<?= $form->field($model, "username")->textInput(['id' => 'input1', 'placeholder' => '点击填写您的姓名'])->label(false); ?>
				</div>
			</div>
			<div class="form-group m-b-20">
				<label for="input3" class="col-xs-2 control-label">性别</label>
				<div class="col-xs-3">
					<label class="radio-inline m-r-20">
						<input type="radio" name="Consultation[gender]" id="inlineRadio1" value="1" checked> 男
					</label>
					<label class="radio-inline m-r-20">
						<input type="radio" name="Consultation[gender]" id="inlineRadio2" value="2"> 女
					</label>
				</div>
			</div>
			<div class="form-group m-b-20">
				<label for="input2" class="col-xs-2 control-label"><b class="color-red">*</b> 联系电话</label>
				<div class="col-xs-3" style="height:35px;">
					<?= $form->field($model, 'phone')->textInput(['id' => 'input2', 'placeholder' => '点击填写您的手机号'])->label(false); ?>
				</div>
			</div>
			<div class="form-group m-b-20">
				<label for="input3" class="col-xs-2 control-label"><b class="color-red">*</b> 预约内容</label>
				<div class="col-xs-10">
					<label class="radio-inline m-r-20">
						<input type="radio" name="Consultation[type]" id="inlineRadio3" value="1" checked> 选校定位
					</label>
					<label class="radio-inline m-r-20">
						<input type="radio" name="Consultation[type]" id="inlineRadio4" value="2"> 专业定位
					</label>
					<label class="radio-inline m-r-20">
						<input type="radio" name="Consultation[type]" id="inlineRadio5" value="3"> 就业定位
					</label>
					<label class="radio-inline m-r-20">
						<input type="radio" name="Consultation[type]" id="inlineRadio6" value="4"> 背景提升
					</label>
					<label class="radio-inline m-r-20">
						<input type="radio" name="Consultation[type]" id="inlineRadio7" value="5"> 时间规划
					</label>
				</div>
			</div>
			<div class="form-group m-b-20">
				<label for="input4" class="col-xs-2 control-label"> 其他需求</label>
				<div class="col-xs-10 p-t-5">
					<?= $form->field($model, "others")->textarea(['placeholder' => '100字以内', 'rows'=>5])->label(false); ?>
				</div>
			</div>
			<div class="form-group m-b-20">
				<label for="input5" class="col-xs-2 control-label"><b class="color-red">*</b> 预约日期</label>
				<div class="col-xs-10">
					<?= $form->field($model, "dates")->textInput(['class'=>'calendar form-control pull-left', 'placeholder'=>'截止日期', 'id'=>'datetimepicker', 'style'=>'width:200px;', "data-date-format" => "yyyy-mm-dd" ])->label(false); ?>
<!--						<input type="text" id="calendar" placeholder="截止日期" class="calendar form-control pull-left" style="width: 200px;">-->
					<div class="color-gray p-t-10">（注：只能选择24小时后的日期）</div>
				</div>
			</div>
			<div class="form-group m-b-20">
				<label for="input6" class="col-xs-2 control-label"><b class="color-red">*</b> 预约时间</label>
				<div class="col-xs-10 time-select">
					<label class="radio-inline m-r-30 p-b-10">
						<input type="radio" name="Consultation[times]" id="inlineRadio8" value="09:00 - 09:30" checked> 09:00 - 09:30
					</label>
					<label class="radio-inline m-r-30 p-b-10">
						<input type="radio" name="Consultation[times]" id="inlineRadio9" value="09:30 - 10:00"> 09:30 - 10:00
					</label>
					<label class="radio-inline m-r-30 p-b-10">
						<input type="radio" name="Consultation[times]" id="inlineRadio10" value="10:00 - 10:30"> 10:00 - 10:30
					</label>
					<label class="radio-inline m-r-30 p-b-10">
						<input type="radio" name="Consultation[times]" id="inlineRadio11" value="10:30 - 11:00"> 10:30 - 11:00
					</label>
					<label class="radio-inline m-r-30 p-b-10">
						<input type="radio" name="Consultation[times]" id="inlineRadio12" value="11:00 - 11:30"> 11:00 - 11:30
					</label>
					<label class="radio-inline m-r-30 p-b-10">
						<input type="radio" name="Consultation[times]" id="inlineRadio13" value="11:30 - 12:00"> 11:30 - 12:00
					</label>
					<label class="radio-inline m-r-30 p-b-10">
						<input type="radio" name="Consultation[times]" id="inlineRadio14" value="12:00 - 12:30"> 12:00 - 12:30
					</label>
					<label class="radio-inline m-r-30 p-b-10">
						<input type="radio" name="Consultation[times]" id="inlineRadio15" value="12:30 - 13:00"> 12:30 - 13:00
					</label>
					<label class="radio-inline m-r-30 p-b-10">
						<input type="radio" name="Consultation[times]" id="inlineRadio16" value="13:00 - 13:30"> 13:00 - 13:30
					</label>
					<label class="radio-inline m-r-30 p-b-10">
						<input type="radio" name="Consultation[times]" id="inlineRadio16" value="13:30 - 14:00"> 13:30 - 14:00
					</label>
					<label class="radio-inline m-r-30 p-b-10">
						<input type="radio" name="Consultation[times]" id="inlineRadio17" value="14:00 - 14:30"> 14:00 - 14:30
					</label>
					<label class="radio-inline m-r-30 p-b-10">
						<input type="radio" name="Consultation[times]" id="inlineRadio18" value="14:30 - 15:00"> 14:30 - 15:00
					</label>
					<label class="radio-inline m-r-30 p-b-10">
						<input type="radio" name="Consultation[times]" id="inlineRadio19" value="15:00 - 15:30"> 15:00 - 15:30
					</label>
					<label class="radio-inline m-r-30 p-b-10">
						<input type="radio" name="Consultation[times]" id="inlineRadio20" value="15:30 - 16:00"> 15:30 - 16:00
					</label>
					<label class="radio-inline m-r-30 p-b-10">
						<input type="radio" name="Consultation[times]" id="inlineRadio21" value="16:00 - 16:30"> 16:00 - 16:30
					</label>
					<label class="radio-inline m-r-30 p-b-10">
						<input type="radio" name="Consultation[times]" id="inlineRadio22" value="16:30 - 17:00"> 16:30 - 17:00
					</label>
					<label class="radio-inline m-r-30 p-b-10">
						<input type="radio" name="Consultation[times]" id="inlineRadio23" value="17:00 - 17:30"> 17:00 - 17:30
					</label>
					<label class="radio-inline m-r-30 p-b-10">
						<input type="radio" name="Consultation[times]" id="inlineRadio24" value="17:30 - 18:00"> 17:30 - 18:00
					</label>
					<label class="radio-inline m-r-30 p-b-10">
						<input type="radio" name="Consultation[times]" id="inlineRadio25" value="18:00 - 18:30"> 18:00 - 18:30
					</label>
					<label class="radio-inline m-r-30 p-b-10">
						<input type="radio" name="Consultation[times]" id="inlineRadio26" value="18:30 - 19:00"> 18:30 - 19:00
					</label>
					<label class="radio-inline m-r-30 p-b-10">
						<input type="radio" name="Consultation[times]" id="inlineRadio27" value="19:00 - 19:30"> 19:00 - 19:30
					</label>
					<label class="radio-inline m-r-30 p-b-10">
						<input type="radio" name="Consultation[times]" id="inlineRadio28" value="19:30 - 20:00"> 19:30 - 20:00
					</label>
					<label class="radio-inline m-r-30 p-b-10">
						<input type="radio" name="Consultation[times]" id="inlineRadio29" value="20:00 - 20:30"> 20:00 - 20:30
					</label>
					<label class="radio-inline m-r-30 p-b-10">
						<input type="radio" name="Consultation[times]" id="inlineRadio30" value="20:30 - 21:00"> 20:30 - 21:00
					</label>
				</div>
			</div>
			<?= $form->field($model, "cost")->hiddenInput(['value'=>99])->label(false); ?>
			<div class="form-group m-b-20">
				<label for="input5" class="col-xs-2 control-label">预约费用</label>
				<div class="col-xs-10">
					<h3 class="m-0"><span class="color-red">99</span> <small class="color-black">元</small></h3>
				</div>
			</div>
		</div>
	</div>
	<div class="text-center m-t-50">
		<?= Html::submitButton("提交信息", ['class' => 'btn btn-blue btn-big-size btn-lg']) ?>
	</div>
</div>
<?php ActiveForm::end(); ?>
<?php
$date = date("Y-m-d", strtotime("+1 day"));
$js = <<<JS
	var date = '{$date}';
	$('#datetimepicker').datetimepicker({
		todayBtn : true,
		startDate : date,
		minView : 2,
		autoclose : true
	});
JS;

$this->registerJs($js);
?>