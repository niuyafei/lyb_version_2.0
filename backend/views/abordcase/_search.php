<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\AbordCaseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="abord-case-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'case_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'grade') ?>

    <?= $form->field($model, 'currentSchool') ?>

    <?= $form->field($model, 'applicationProject') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'admissionSchool') ?>

    <?php // echo $form->field($model, 'admissionMajor') ?>

    <?php // echo $form->field($model, 'specialty') ?>

    <?php // echo $form->field($model, 'winning') ?>

    <?php // echo $form->field($model, 'sat') ?>

    <?php // echo $form->field($model, 'toefl') ?>

    <?php // echo $form->field($model, 'act') ?>

    <?php // echo $form->field($model, 'gpa') ?>

    <?php // echo $form->field($model, 'ielts') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
