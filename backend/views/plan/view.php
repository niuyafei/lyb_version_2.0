<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Plan */

$this->title = $model->plan_id;
$this->params['breadcrumbs'][] = ['label' => 'Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->plan_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->plan_id], [
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
            'plan_id',
            'username',
            'applicationProject',
            'user_id',
            'phone',
            'weixin',
            'email:email',
            'currentSchool',
            'grade',
            'graduationSchool',
            'major',
            'toefl',
            'sat',
            'act',
            'ielts',
            'gpa_h',
            'gpa_m',
            'gpa_u',
            'gpa_major',
            'ssat',
            'gre',
            'gmat',
            'ap',
            'winning:ntext',
            'communityActivities:ntext',
            'publicBenefitActivities:ntext',
            'relatives:ntext',
            'academicActivities:ntext',
            'pay_type',
            'status',
            'workExperience',
            'created_at',
        ],
    ]) ?>

</div>
