<?php

namespace backend\controllers;

use common\models\Schools;
use common\models\StudyPlan;
use common\models\TimePlan;
use Yii;
use common\models\Plan;
use common\models\search\PlanSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\base\BaseController;
use yii\data\Pagination;

/**
 * PlanController implements the CRUD actions for Plan model.
 */
class PlanController extends BaseController
{
    public $pageSize = 10;

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
     * Lists all Plan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = Plan::find();
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => $this->pageSize,
        ]);
        $data = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', [
            'data' => $data,
            'pages' => $pages,
        ]);
    }

    /**
     * Displays a single Plan model.
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
     * Creates a new Plan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = Plan::findOne($id);
        if(StudyPlan::find()->where(['plan_id' => $model->plan_id])->exists() && TimePlan::find()->where(['plan_id' => $model->plan_id])->exists()){
            Yii::$app->session->setFlash('success', "方案已存在");
            return $this->redirect(['plan/update', "id" => $model->plan_id]);
        }
        $schools = new Schools();
        $studyPlan = new StudyPlan();
        $timePlan = new TimePlan();

        if ($data = Yii::$app->request->post()) {
            $studyPlan->load($data);
            $studyPlan->plan_id = $model->plan_id;
            $studyPlan->user_id = $model->user_id;
            if(!($studyPlan->validate() && $studyPlan->save())){
                Yii::$app->session->setFlash('error', "留学规划生成错误");
                return $this->redirect(['plan/index']);
            }

            for($i=0; $i<count($data['schools']['rank']); $i++){
                $array = array_column($data['schools'], $i);
                $schoolModel = new Schools();
                $schoolModel->plan_id = $model->plan_id;
                $schoolModel->user_id = $model->user_id;
                $schoolModel->type = $array[0];
                $schoolModel->rank = $array[1];
                $schoolModel->sat = $array[2];
                $schoolModel->schoolName = $array[3];
                $schoolModel->applyType = $array[4];
                $schoolModel->created_at = date("Y-m-d H:i:s");
                if(!($schoolModel->validate() && $schoolModel->save())){
                    Yii::$app->session->setFlash("error", "留学规划-学校表保存失败");
                    return $this->redirect(['plan/index']);
                }
            }

            for($j=0; $j<count($data['timePlan']['grade']); $j++){
                $array = array_column($data['timePlan'], $j);
                $timePlanModel = new TimePlan();
                $timePlanModel->plan_id = $model->plan_id;
                $timePlanModel->user_id = $model->user_id;
                $timePlanModel->grade = $array[0];
                $timePlanModel->type = $array[1];
                $timePlanModel->dates = $array[2];
                $timePlanModel->content = $array[3];
                $timePlanModel->created_at = date("Y-m-d H:i:s");
                if(!($timePlanModel->validate() && $timePlanModel->save())){
                    Yii::$app->session->setFlash('error', "留学规划-时间规划保存失败");
                }
            }
            Yii::$app->session->setFlash('success', "留学规划方案生成成功");
            return $this->redirect(['plan/index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'schools' => $schools,
                'studyPlan' => $studyPlan,
                'timePlan' => $timePlan
            ]);
        }
    }

    /**
     * Updates an existing Plan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if(!StudyPlan::find()->where(['plan_id' => $model->plan_id])->exists()){
            return $this->redirect(['plan/create', "id" => $id]);
            exit;
//            Yii::$app->session->setFlash('error', "方案不存在，请先编辑方案");
//            $this->goFrom();
        }
        $studyPlan = StudyPlan::find()->where(['plan_id' => $model->plan_id])->one();
        $timePlan = TimePlan::find()->where(['plan_id' => $model->plan_id])->orderBy("grade asc")->all();
        $schools = Schools::find()->where(['plan_id' => $model->plan_id])->orderBy("type ASC,rank ASC")->all();

        if ($data = Yii::$app->request->post()) {
            $studyPlan->load($data);
            if(!($studyPlan->validate() && $studyPlan->save())){
                Yii::$app->session->setFlash('error', "方案更新失败");
                return $this->redirect(['plan/index']);
            }

            for($i=0; $i<count($data['schools']['id']); $i++){
                $array = [
                    $data['schools']['id'][$i],
                    $data['schools']['rank'][$i],
                    $data['schools']['sat'][$i],
                    $data['schools']['schoolName'][$i],
                    $data['schools']['applyType'][$i],
                ];
//                $array = array_column($data['schools'], $i);
                $school = Schools::findOne($array[0]);
                $school->schoolName = $array[3];
                $school->rank = $array[1];
                $school->sat = $array[2];
                $school->applyType = $array[4];
                if(!($school->validate() && $school->save())){
                    Yii::$app->session->setFlash('error', "选校列表更新失败");
                    return $this->redirect(['plan/index']);
                }
            }

            for($j=0; $j<count($data['timePlan']['id']); $j++){
                $array = [
                    $data['timePlan']['id'][$j],
                    $data['timePlan']['content'][$j],
                ];
//                $array = array_column($data['timePlan'], $j);
                $timePlanModel = TimePlan::findOne($array[0]);
                $timePlanModel->content = str_replace("/r/n", "，", $array[1]);
                if(!($timePlanModel->validate() && $timePlanModel->save())){
                    Yii::$app->session->setFlash('error', "时间规划更新失败");
                    return $this->redirect(['plan/index']);
                }
            }

            Yii::$app->session->setFlash('success', '方案更新成功');
            return $this->redirect(['plan/view?id='.$model->plan_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'studyPlan' => $studyPlan,
                'timePlan' => $timePlan,
                'schools' => $schools,
            ]);
        }
    }

    /**
     * Deletes an existing Plan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionAddschools()
    {
        date_default_timezone_set("PRC");

        $data = Yii::$app->request->get();
        $model = new Schools();
        $model->user_id = $data['user_id'];
        $model->plan_id = $data['plan_id'];
        $model->schoolName = $data['schoolName'];
        $model->sat = $data['sat'];
        $model->rank = $data["schoolRank"];
        $model->type = $data['type'];
        $model->applyType = $data['applyType'];
        $model->created_at = date("Y-m-d H:i:s");
        if($model->save()){
            return json_encode([
                'code' => 200
            ]);
        }else{
            return json_encode([
                'code' => 20,
                'message' => '保存失败'
            ]);
        }

    }


    /**
     * Finds the Plan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Plan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Plan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
