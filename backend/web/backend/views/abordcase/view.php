<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AbordCase */

$this->title = $model->case_id;
$this->params['breadcrumbs'][] = ['label' => 'Abord Cases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="abord-case-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->case_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->case_id], [
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
            'case_id',
            'user_id',
            'grade',
            'currentSchool',
            'applicationProject',
            'status',
            'admissionSchool',
            'admissionMajor',
            'specialty:ntext',
            'winning:ntext',
            'sat',
            'toefl',
            'act',
            'gpa',
            'ielts',
            'created_at',
        ],
    ]) ?>

</div>
