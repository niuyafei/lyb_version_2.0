<?php

namespace backend\controllers;

use Yii;
use common\models\Course;
use common\models\search\CourseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\AbordCase;
use common\models\User;
use yii\data\ActiveDataProvider;
use backend\base\BaseController;

/**
 * CourseController implements the CRUD actions for Course model.
 */
class CourseController extends BaseController
{
    public $enableCsrfToken = false;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Course models.
     * @return mixed
     */
    public function actionIndex()
    {
        $user_id = Yii::$app->request->get('user_id', '');
        $case_id = Yii::$app->request->get('case_id', '');
        $where['user_id'] = $user_id;
        $where['case_id'] = $case_id;

        $dataProvider = new ActiveDataProvider([
            'query' => Course::find()->where($where)->orderBy('type asc,dates asc'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'user_id' => $user_id,
            'case_id' => $case_id
        ]);
    }

    /**
     * Displays a single Course model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Course model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $url = Yii::$app->request->referrer;
        $model = new Course();
        if ($model->load(Yii::$app->request->post())) {
            $url = Yii::$app->request->post("url");
            $model->created_at = date('Y-m-d H:i:s');

            if($model->validate() && $model->save()){
                Yii::$app->session->setFlash('success', "保存成功");
            }else{
                Yii::$app->session->setFlash('error', "数据校验失败");
            }
            $this->goFrom($url);
        } else {
            $user_id = Yii::$app->request->get('user_id', '');
            $case_id = Yii::$app->request->get('case_id', '');

            if(!$case_id || !$user_id || !User::find()->where(['id' => $user_id])->exists() || !AbordCase::find()->where(['case_id' => $case_id])->exists()){
                return $this->redirect(['abordcase/index']);
            }

            $courseArr = Course::find()->where(['user_id'=>$user_id, 'case_id'=>$case_id])->asArray()->all();

            return $this->render('create', [
                'model' => $model,
                'user_id' => $user_id,
                'case_id' => $case_id,
                'url' => $url,
                'courseArr' => $courseArr,
            ]);
        }
    }

    /**
     * Updates an existing Course model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {
        $id = Yii::$app->request->post("id");
        $model = $this->findModel($id);
        $dates = Yii::$app->request->post("dates", "");
        $content = Yii::$app->request->post("content", "");
        $model->dates = $dates;
        $model->content = $content;

        if ($model->validate() && $model->save()) {
            return json_encode(['code' => 200]);
//            return $this->redirect(['view', 'id' => $model->course_id]);
        } else {
            return json_encode(['code' => 20]);
//            return $this->render('update', [
//                'model' => $model,
//            ]);
        }
    }

    /**
     * Deletes an existing Course model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->post("id");
        if($this->findModel($id)->delete()){
            return json_encode(['code' => 200]);
        }else{
            return json_encode(['code' => 20]);
        }

//        return $this->redirect(['index']);

    }

    public function actionDel()
    {
        $id = Yii::$app->request->get("id", "");
        if(!$id){
            Yii::$app->session->setFlash("error", "参数错误");
        }else{
            if(Course::deleteAll(["course_id" => $id])){
                Yii::$app->session->setFlash("success", "删除成功");
            }else{
                Yii::$app->session->setFlash("error", "删除失败");
            }
        }
        $this->goFrom();

    }

    public function actionAdd()
    {
        date_default_timezone_set("PRC");
        $gets = Yii::$app->request->get();
        $model = new Course();
        $model->user_id = $gets['user_id'];
        $model->case_id = $gets['case_id'];
        $model->dates = $gets['dates'];
        $model->content = $gets['content'];
        $model->type = $gets['type'];
        $model->created_at = date("Y-m-d H:i:s");
        if($model->validate() && $model->save()){
            return json_encode([
                'code' => 200,
                'course_id' => $model->course_id
            ]);
        }else{
            return json_encode([
                'code' => 20,
                'error' => $model->getErrors()[0]
            ]);
        }
    }

    /**
     * Finds the Course model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Course the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Course::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
