<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ExpertComments */

$this->title = 'Update Expert Comments: ' . $model->comment_id;
$this->params['breadcrumbs'][] = ['label' => 'Expert Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->comment_id, 'url' => ['view', 'id' => $model->comment_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="expert-comments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
