<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\PlanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'plan_id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'applicationProject') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'weixin') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'currentSchool') ?>

    <?php // echo $form->field($model, 'grade') ?>

    <?php // echo $form->field($model, 'graduationSchool') ?>

    <?php // echo $form->field($model, 'major') ?>

    <?php // echo $form->field($model, 'toefl') ?>

    <?php // echo $form->field($model, 'sat') ?>

    <?php // echo $form->field($model, 'act') ?>

    <?php // echo $form->field($model, 'ielts') ?>

    <?php // echo $form->field($model, 'gpa_h') ?>

    <?php // echo $form->field($model, 'gpa_m') ?>

    <?php // echo $form->field($model, 'gpa_u') ?>

    <?php // echo $form->field($model, 'gpa_major') ?>

    <?php // echo $form->field($model, 'ssat') ?>

    <?php // echo $form->field($model, 'gre') ?>

    <?php // echo $form->field($model, 'gmat') ?>

    <?php // echo $form->field($model, 'ap') ?>

    <?php // echo $form->field($model, 'winning') ?>

    <?php // echo $form->field($model, 'communityActivities') ?>

    <?php // echo $form->field($model, 'publicBenefitActivities') ?>

    <?php // echo $form->field($model, 'relatives') ?>

    <?php // echo $form->field($model, 'academicActivities') ?>

    <?php // echo $form->field($model, 'pay_type') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'workExperience') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
