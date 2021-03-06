<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/11/30
 * Time: 下午10:34
 */
?>
<h4 class="text-center">成绩信息</h4>
<div class="row case-edit-formwidth">
	<hr class="m-t-0 border-dashed"/>
	<h5 class="color-gray m-b-20 p-l-20">语言成绩</h5>
	<div class="col-xs-6">
		<div class="row">
			<div class="col-xs-3 text-right p-t-5 p-r-0">
				<b>TOFEL：</b>
			</div>
			<div class="col-xs-9">
				<div class="form-group field-abordcase-toefl has-success">
					<input type="text" id="abordcase-toefl" class="form-control" name="AbordCase[toefl]" value="<?= $model->toefl; ?>" aria-invalid="false">
					<div class="help-block"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-6">
		<div class="row">
			<div class="col-xs-3 text-right p-t-5 p-r-0">
				<b>雅思：</b>
			</div>
			<div class="col-xs-9">
				<div class="form-group field-abordcase-ielts">

					<input type="text" id="abordcase-ielts" class="form-control" name="AbordCase[ielts]" value="<?= $model->ielts; ?>">

					<div class="help-block"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row case-edit-formwidth">
	<hr class="border-dashed"/>
	<h5 class="m-b-20 p-l-20 color-gray">标化成绩</h5>
	<div class="col-xs-6">
		<div class="row">
			<div class="col-xs-3 text-right p-t-5 p-r-0">
				<b>GRE：</b>
			</div>
			<div class="col-xs-9">
				<div class="form-group field-abordcase-sat">

					<input type="text" id="abordcase-sat" class="form-control" name="AbordCase[gre]" value="<?= $model->gre; ?>">

					<div class="help-block"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-6">
		<div class="row">
			<div class="col-xs-3 text-right p-t-5 p-r-0">
				<b>GMAT：</b>
			</div>
			<div class="col-xs-9">
				<div class="form-group field-abordcase-act">

					<input type="text" id="abordcase-act" class="form-control" name="AbordCase[gmat]" value="<?= $model->gmat; ?>">

					<div class="help-block"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row case-edit-formwidth">
	<hr class="border-dashed"/>
	<h5 class="m-b-20 p-l-20 color-gray">平时成绩</h5>
	<div class="col-xs-6">
		<div class="row">
			<div class="col-xs-3 text-right p-t-5 p-r-0">
				<b>大学GPA：</b>
			</div>
			<div class="col-xs-9">
				<div class="form-group field-abordcase-gpa">

					<input type="text" id="abordcase-gpa" class="form-control" name="AbordCase[gpa_u]" value="<?= $model->gpa_u; ?>">

					<div class="help-block"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-6">
		<div class="row">
			<div class="col-xs-3 text-right p-t-5 p-r-0">
				<b>专业课GPA：</b>
			</div>
			<div class="col-xs-9">
				<div class="form-group field-abordcase-gpa">

					<input type="text" id="abordcase-gpa" class="form-control" name="AbordCase[gpa_major]" value="<?= $model->gpa_major; ?>">

					<div class="help-block"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<hr />