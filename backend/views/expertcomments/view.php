<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ExpertComments */

$this->title = $model->comment_id;
$this->params['breadcrumbs'][] = ['label' => 'Expert Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expert-comments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->comment_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->comment_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'comment_id',
            'user_id',
            'case_id',
            'expert_id',
            'content:ntext',
            'video',
            'language',
            'status',
            'created_at',
        ],
    ]) ?>

</div>
