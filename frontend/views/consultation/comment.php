<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/11/7
 * Time: 上午12:45
 */

$this->title = "预约咨询";
?>

<div class="container">
	<h2 class="text-center m-t-30">预约咨询</h2>
	<hr class="cont-tit-border" />
	<div class="row step-style">
		<div class="col-xs-2 text-center">
			<span class="gray-circle">
				1
			</span>
			<h4 class="color-gray">填写信息</h4>
		</div>
		<div class="col-xs-1">
			<p class="gray-line"></p>
		</div>
		<div class="col-xs-2 text-center">
			<span class="gray-circle">
				2
			</span>
			<h4 class="color-gray">支付费用</h4>
		</div>
		<div class="col-xs-1">
			<p class="gray-line"></p>
		</div>
		<div class="col-xs-2 text-center">
			<span class="gray-circle">
				3
			</span>
			<h4 class="color-gray">专家答疑</h4>
		</div>
		<div class="col-xs-1">
			<p class="gray-line"></p>
		</div>
		<div class="col-xs-2 text-center">
			<span class="red-circle">
				4
			</span>
			<h4 class="color-red">评价建议</h4>
		</div>
	</div>
	<div class="border-color p-20 m-t-50 small-box assess-label">
		<input type="hidden" name="id" value="<?= $model['consultation_id']; ?>" id="id" >
		<div class="p-l-30 p-r-30">
			<p>您好，本次咨询服务已结束，请对服务内容进行点评并提出相关建议。<br /> 对于提交评价和建议的用户，将有机会获得留洋帮送出的 <span class="color-red">“3000元奖学金”</span> 以及其他超值感恩回馈活动。<br /> 感谢您的反馈。
			</p>
			<div class="row m-b-20 m-t-30">
				<div class="col-xs-2 color-gray text-right">
					<b class="color-red">* <span class="color-black">星级评价</span></b>
				</div>
				<div class="col-xs-10 p-l-0">
					<div id="space-demo" class="target-demo"></div>
					<script type="text/javascript">
						$(function() {
							$.fn.raty.defaults.path = '/lib/img';
							$('#space-demo').raty({ space: false });
						});
					</script>
				</div>
			</div>
			<div class="row m-b-20 m-t-30">
				<div class="col-xs-2 text-right">
					<b>相关建议</b>
				</div>
				<div class="col-xs-10 color-red p-l-0 p-r-0">
					<textarea class="form-control" rows="5" placeholder="点击填写评价建议。"></textarea>
				</div>
			</div>
		</div>
	</div>
	<div class="text-center m-t-50">
		<button id="submit" class="btn btn-blue btn-big-size btn-lg">提交信息</button>
	</div>
</div>
<?php
$js = <<<JS
	var domain = document.domain;
	var url = "http://" + domain;
	$("#submit").click(function(){
		var starts = $("input[name='score']").val();
		var comment = $("textarea").val();
		var id = $("#id").val();
		$.get(url + "/consultation/addcomment?id="+id+"&starts="+starts+"&comment="+comment, function(re){
			data = eval("(" + re + ")");
			if(data.code == 200){
				window.location.href=url+"/consultation/view";
			}
		})
	});
JS;

$this->registerJs($js);
?>