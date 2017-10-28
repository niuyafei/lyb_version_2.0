<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AbordCase */

$this->title = 'Update Abord Case: ' . $model->case_id;
$this->params['breadcrumbs'][] = ['label' => 'Abord Cases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->case_id, 'url' => ['view', 'id' => $model->case_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="abord-case-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
