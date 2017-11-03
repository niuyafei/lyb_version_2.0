<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Expert */

use yii\widgets\ActiveForm;
use common\models\AbordCase;

$this->title = '专家管理';
?>
<div class="col-xs-10">
    <h4 class="color-blue"><?= $this->title; ?> - 编辑</h4>
    <hr class="m-t-5" />
    <div class="p-20 p-t-0">
        <?php
        $form = ActiveForm::begin([
            'method' => 'post',
            'action' => ['expert/update'],
        ]);
        ?>
        <div class="case-edit-cont">
            <h4 class="text-center m-b-20">专家信息</h4>
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
                <div class="col-xs-9">
                    <div class="row">
                        <div class="col-xs-3 text-right p-t-5 p-r-0">
                            <b><span class="color-red">*</span> 头像：</b>
                        </div>
                        <div class="col-xs-9">
                            <?= $form->field($model, "headimgurl")->fileInput()->label(false); ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-9">
                    <div class="row">
                        <div class="col-xs-3 text-right p-t-5 p-r-0">
                            <b><span class="color-red">*</span> 头像：</b>
                        </div>
                        <div class="col-xs-9">
                            <?= $form->field($model, "status")->dropDownList(\common\models\Expert::dropDown())->label(false); ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-9">
                    <div class="row">
                        <div class="col-xs-3 text-right p-t-5 p-r-0">
                            <b><span class="color-red">*</span> 专家介绍：</b>
                        </div>
                        <div class="col-xs-9">
                            <?= $form->field($model, "desc")->textarea()->label(false); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row case-edit-formwidth">
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
