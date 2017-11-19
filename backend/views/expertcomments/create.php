<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Expert;


/* @var $this yii\web\View */
/* @var $model common\models\ExpertComments */

$this->title = '留学案例';
?>
<div class="col-xs-10">
    <h4 class="color-blue">专家点评 - 新增</h4>
    <hr class="m-t-5" />
    <div class="p-20 p-t-0">
        <?php $form = ActiveForm::begin([
            'action' => ['expertcomments/create'],
            'method' => 'post',
            'options' => ['enctype' => 'multipart/form-data'],
        ]); ?>
        <?= $form->field($model, 'user_id')->hiddenInput(['value' => $user_id])->label(false); ?>

        <?= $form->field($model, 'case_id')->hiddenInput(['value' => $case_id])->label(false) ?>

        <div class="case-edit-cont">
            <div class="case-edit-cont">
                <h4 class="text-center m-b-20">专家点评</h4>
                <div class="row case-edit-formwidth">
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>专家姓名：</b>
                            </div>
                            <div class="col-xs-9">
                                <?= $form->field($model, 'expert_id')->dropDownList(Expert::getExperts())->label(false); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row case-edit-formwidth">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>专家点评：</b>
                            </div>
                            <div class="col-xs-10">
                                <?//= $form->field($model, "content")->textarea()->label(false); ?>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="row case-edit-formwidth">
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>音频文件：</b>
                            </div>
                            <div class="col-xs-9">
                                <?= $form->field($model, 'video')->fileInput()->label(false); ?>
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
                                <?= $form->field($model, 'language')->dropDownList([ 1 => '中文', 2 => '英文', ], ['prompt' => '英文'])->label(false); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-xs-6 text-right">
                        <?= Html::submitButton("保存", ['class' => 'btn btn-blue btn-lg p-l-20 p-r-20']) ?>
                    </div>
                </div>
            </div>
            <hr />
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
