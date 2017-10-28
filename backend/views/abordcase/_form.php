<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AbordCase */
/* @var $form yii\widgets\ActiveForm */

use common\models\AbordCase;
?>

<div class="abord-case-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'grade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'currentSchool')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'applicationProject')->dropDownList(AbordCase::dropDown("applicationProject")); ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'admissionSchool')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admissionMajor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'specialty')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'winning')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'toefl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gpa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ielts')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
