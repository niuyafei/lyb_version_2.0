<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\Expert */

$this->title = 'Create Expert';
$this->params['breadcrumbs'][] = ['label' => 'Experts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expert-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="expert-form">

        <?php $form = ActiveForm::begin([
            'action' => ['expert/create'],
            'method' => 'post',
            'options' => ['enctype' => 'multipart/form-data'],
        ]); ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'headimgurl')->fileInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

        <div class="form-group">
            <?= Html::submitButton("提交", ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
