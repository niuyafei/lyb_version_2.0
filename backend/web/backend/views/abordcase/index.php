<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\AbordCaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Abord Cases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="abord-case-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Abord Case', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'case_id',
            'user_id',
            'grade',
            'currentSchool',
            'applicationProject',
            // 'status',
            // 'admissionSchool',
            // 'admissionMajor',
            // 'specialty:ntext',
            // 'winning:ntext',
            // 'sat',
            // 'toefl',
            // 'act',
            // 'gpa',
            // 'ielts',
            // 'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
