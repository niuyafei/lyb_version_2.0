<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\Expert */


$this->title = "专家管理";
$this->params['breadcrumbs'][] = ['label' => 'Experts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-10">
    <h4 class="color-blue">专家管理 - 新增</h4>
    <hr class="m-t-5" />
    <div class="p-20 p-t-0">
        <?php
        $form = ActiveForm::begin([
            'method' => 'post',
            'action' => ['expert/create'],
            'options' => ['enctype' => 'multipart/form-data'],
        ]);
        ?>
        <div class="case-edit-cont">
            <div class="case-edit-cont">
                <h4 class="text-center m-b-20">添加留洋专家</h4>
                <div class="row case-edit-formwidth p-l-0 p-r-0 case-edit-licheng">
                    <p></p>
                    <div class="col-xs-9">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>姓名：</b>
                            </div>
                            <div class="col-xs-9">
                                <?= $form->field($model, "username")->textInput()->label(false); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-9">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>性别：</b>
                            </div>
                            <div class="col-xs-9">
                                <?= $form->field($model, "gender")->dropDownList(['1' => '男', '2' => '女'])->label(false); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-9">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>头像：</b>
                            </div>
                            <div class="col-xs-9">
                                <?= $form->field($model, "headimgurl")->fileInput()->label(false); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-9">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>手机号：</b>
                            </div>
                            <div class="col-xs-9">
                                <?= $form->field($model, "phone")->textInput()->label(false); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-9">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>邮箱：</b>
                            </div>
                            <div class="col-xs-9">
                                <?= $form->field($model, "email")->textInput()->label(false); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-9">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>专家介绍：</b>
                            </div>
                            <div class="col-xs-9">
                                <?= $form->field($model, "desc")->textarea()->label(false); ?>
                            </div>
                        </div>
                    </div>
                    <p class="col-xs-12 text-right m-t-25 m-b-20"></p>
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
