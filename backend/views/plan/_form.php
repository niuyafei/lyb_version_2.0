<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Plan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'applicationProject')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weixin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'currentSchool')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'toefl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ielts')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gpa_h')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gpa_m')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gpa_u')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gpa_major')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ssat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gmat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'winning')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'communityActivities')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'publicBenefitActivities')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'relatives')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pay_type')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
