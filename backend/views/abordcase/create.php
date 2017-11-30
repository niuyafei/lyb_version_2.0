<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AbordCase */

use common\models\AbordCase;
use yii\widgets\ActiveForm;

$this->title = '留学案例';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-10">
    <h4 class="color-blue"><?= $this->title; ?> - 新增</h4>
    <hr class="m-t-5" />
    <div class="p-20 p-t-0">
        <?php
        $form = ActiveForm::begin([
            'method' => 'post',
            'action' => ['abordcase/create'],
        ]);
        ?>
        <div class="case-edit-cont">
            <h4 class="text-center m-b-20">学生信息</h4>
            <div class="row case-edit-formwidth">
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-3 text-right p-t-5 p-r-0">
                            <b><span class="color-red">*</span> 姓名：</b>
                        </div>
                        <div class="col-xs-9">
                            <?= $form->field($model, "username")->textInput()->label(false); ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-3 text-right p-t-5 p-r-0">
                            <b><span class="color-red">*</span> 所在年级：</b>
                        </div>
                        <div class="col-xs-9">
                            <?= $form->field($model, "grade")->textInput()->label(false); ?>
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
                                    <input type="radio" checked="checked" name="gender"> 男
                                </label>
                                <label class="p-r-15">
                                    <input type="radio" name="gender"> 女
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
                            <?= $form->field($model, "currentSchool")->textInput()->label(false); ?>
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
                            <?= $form->field($model, "applicationProject")->dropDownList(AbordCase::dropDown("applicationProject"))->label(false); ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-3 text-right p-t-5 p-r-0">
                            <b><span class="color-red">*</span> 录取学校：</b>
                        </div>
                        <div class="col-xs-9">
                            <?= $form->field($model, "admissionSchool")->textInput()->label(false); ?>
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
                            <?= $form->field($model, "admissionMajor")->textInput()->label(false); ?>
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
                            <?= $form->field($model, "specialty")->textarea()->label(false); ?>
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
                            <?= $form->field($model, "winning")->textarea()->label(false); ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
        </div>

        <div class="case-edit-cont" id="score">
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
                            <?= $form->field($model, "toefl")->textInput()->label(false); ?>
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
                            <b>SSAT：</b>
                        </div>
                        <div class="col-xs-9">
                            <?= $form->field($model, "ssat")->textInput()->label(false); ?>
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
                            <b>GPA：</b>
                        </div>
                        <div class="col-xs-9">
                            <?= $form->field($model, "gpa")->textInput()->label(false); ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
        </div>

        <div class="row">
            <div class="col-xs-6 text-right">
                <?= Html::submitButton("保存", ['class' => 'btn btn-blue btn-lg p-l-20 p-r-20']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php
$js = <<<JS
    $("select[name='AbordCase[applicationProject]']").change(function(){
        var type = $(this).val();
        $.get("/abordcase/getform?type=" + type + "&case_id=0", function(html){
            $("#score").html(html);
        })
    });
JS;

$this->registerJs($js);
?>
