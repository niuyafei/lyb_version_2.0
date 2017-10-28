<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Course;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?//= $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?//= Html::a('Create Course', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'case_id',
            [
                'label' => '用户名',
                'attribute' => 'user_id',
                'value' => 'users.username'
            ],
            [
                'attribute' => 'type',
                'value' => function($model){
                    return Course::dropDown($model->type);
                }
            ],

            'dates',
            'content:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => "{update}{delete}"
            ],
        ],
    ]); ?>
</div>
