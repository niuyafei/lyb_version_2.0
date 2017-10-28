<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Plans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Plan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'plan_id',
            'username',
            'applicationProject',
            'user_id',
            'phone',
            // 'weixin',
            // 'email:email',
            // 'currentSchool',
            // 'grade',
            // 'graduationSchool',
            // 'major',
            // 'toefl',
            // 'sat',
            // 'act',
            // 'ielts',
            // 'gpa_h',
            // 'gpa_m',
            // 'gpa_u',
            // 'gpa_major',
            // 'ssat',
            // 'gre',
            // 'gmat',
            // 'ap',
            // 'winning:ntext',
            // 'communityActivities:ntext',
            // 'publicBenefitActivities:ntext',
            // 'relatives:ntext',
            // 'academicActivities:ntext',
            // 'pay_type',
            // 'status',
            // 'workExperience',
            // 'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
