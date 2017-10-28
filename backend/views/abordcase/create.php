<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AbordCase */

$this->title = 'Create Abord Case';
$this->params['breadcrumbs'][] = ['label' => 'Abord Cases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="abord-case-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
