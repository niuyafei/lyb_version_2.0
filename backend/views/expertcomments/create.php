<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Expert;


/* @var $this yii\web\View */
/* @var $model common\models\ExpertComments */

$this->title = 'Create Expert Comments';
$this->params['breadcrumbs'][] = ['label' => 'Expert Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expert-comments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="expert-comments-form">

        <?php $form = ActiveForm::begin([
            'action' => ['expertcomments/create'],
            'method' => 'post',
            'options' => ['enctype' => 'multipart/form-data'],
        ]); ?>

        <input type="hidden" name="ExpertComments['user_id']" value="<?= $user_id ?>" >

        <?= $form->field($model, 'user_id')->hiddenInput(['value' => $user_id])->label(false); ?>

        <?= $form->field($model, 'case_id')->hiddenInput(['value' => $case_id])->label(false) ?>

        <?= $form->field($model, 'expert_id')->dropDownList(Expert::getExperts()) ?>

        <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'video')->fileInput(); ?>

        <?= $form->field($model, 'language')->dropDownList([ 1 => '中文', 2 => '英文', ], ['prompt' => '']) ?>

        <div class="form-group">
            <?= Html::submitButton('Create', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
