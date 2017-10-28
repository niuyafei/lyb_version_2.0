<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Course;

/* @var $this yii\web\View */
/* @var $model common\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'case_id')->hiddenInput(['value' => $case_id])->label(false); ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value' => $user_id])->label(false); ?>

    <?= $form->field($model, 'type')->dropDownList(Course::dropDown()); ?>

    <?= $form->field($model, 'dates')->textInput() ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
