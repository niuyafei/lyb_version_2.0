<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Course */

use yii\widgets\ActiveForm;
use common\models\Course;

$this->title = '留学案例';
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-10">
    <h4 class="color-blue">申请历程 - 新增</h4>
    <hr class="m-t-5" />
    <?php foreach($courseArr as $key => $value): ?>
        <div class="case-edit-cont">
            <div class="case-edit-cont">
                <h4 class="text-center m-b-20"><?= \common\models\Course::dropDown($value['type']); ?></h4>
                <div class="row case-edit-formwidth p-l-0 p-r-0 case-edit-licheng">
                    <p></p>
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>申请历程：</b>
                            </div>
                            <div class="col-xs-9">
                                <?= \common\models\Course::dropDown($value['type']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>时间：</b>
                            </div>
                            <div class="col-xs-9">
                                <?= $value['dates']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 m-t-25">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>内容：</b>
                            </div>
                            <div class="col-xs-10">
                                <?= $value['content']; ?>
                            </div>
                        </div>
                    </div>
                    <p class="col-xs-12 text-right m-t-25 m-b-20"></p>
                </div>
            </div>
            <hr />
        </div>
    <?php endforeach; ?>
    <div class="p-20 p-t-0">
        <?php
        $form = ActiveForm::begin([
            'method' => 'post',
            'action' => ['course/create'],
        ]);

        ?>
        <input type="hidden" value="<?= $url ?>" name="url" >

        <?= $form->field($model, 'case_id')->hiddenInput(['value' => $case_id])->label(false); ?>

        <?= $form->field($model, 'user_id')->hiddenInput(['value' => $user_id])->label(false); ?>

        <div class="case-edit-cont">
            <div class="case-edit-cont">
                <h4 class="text-center m-b-20">申请历程</h4>
                <div class="row case-edit-formwidth p-l-0 p-r-0 case-edit-licheng">
                    <p></p>
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>申请历程：</b>
                            </div>
                            <div class="col-xs-9">
                                <?= $form->field($model, "type")->dropDownList(Course::dropDown())->label(false); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>时间：</b>
                            </div>
                            <div class="col-xs-9">
                                <?= $form->field($model, "dates")->textInput(['placeholder' => '申请时间 2017-10-01'])->label(false); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 m-t-25">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>内容：</b>
                            </div>
                            <div class="col-xs-10">
                                <?= $form->field($model, "content")->textarea()->label(false); ?>
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
