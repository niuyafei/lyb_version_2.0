<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Expert */

$this->title = 'Update Expert: ' . $model->expert_id;
$this->params['breadcrumbs'][] = ['label' => 'Experts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->expert_id, 'url' => ['view', 'id' => $model->expert_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="expert-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
