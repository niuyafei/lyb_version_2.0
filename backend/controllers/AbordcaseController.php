<?php

namespace backend\controllers;

use common\models\Course;
use common\models\ExpertComments;
use Yii;
use common\models\AbordCase;
use common\models\search\AbordCaseSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use backend\base\BaseController;

/**
 * AbordCaseController implements the CRUD actions for AbordCase model.
 */
class AbordcaseController extends BaseController
{
    public $pageSize = 10;

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
     * Lists all AbordCase models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = AbordCase::find()->where(['status' => [1,2]]);
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
     * Displays a single AbordCase model.
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
     * Creates a new AbordCase model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AbordCase();

        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                Yii::$app->session->setFlash('success', "保存成功");
            }else{
                Yii::$app->session->setFlash('error', "失败");
            }

            return $this->redirect(['abordcase/index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AbordCase model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "更新成功");
            return $this->redirect(['index']);
        }

        return $this->render("update", [
            'model' => $model
        ]);
    }

    public function actionUpdate2($case_id)
    {
        date_default_timezone_set("PRC");
        $caseModel = $this->findModel($case_id);
        //专家点评
        $expertCommentModel = ExpertComments::find()->where(['case_id' => $case_id])->one();
        if(!$expertCommentModel){
            $expertCommentModel = new ExpertComments();
        }

        if($data = Yii::$app->request->post()){
            $caseModel->load($data['AbordCase']);
            if($caseModel->validate()){
                $caseModel->save();
            }else{
                Yii::$app->session->setFlash('error', "生成案例失败");
                $this->goFrom();
            }
            //保存音频文件
            $expertCommentModel->case_id = $caseModel->case_id;
            $expertCommentModel->user_id = $caseModel->user_id;
            $expertCommentModel->expert_id = $data['ExpertComments']['expert_id'];
            $expertCommentModel->created_at = date("Y-m-d H:i:s");
            if($data['ExpertComments']['language']){
                $expertCommentModel->language = $data['ExpertComments']['language'];
            }


            $name = $_FILES['ExpertComments']['name']['video'];
            $ext = mb_substr($name, mb_strrpos($name, '.', 'utf-8'), mb_strlen($name, "utf-8"), "utf-8");
            $path = "/Uploads/videos/";
            $fileName = $path . "expert_comments_" . time();

            $expertCommentModel->video = $fileName . $ext;
            $command = "/usr/bin/ffmpeg -i " . dirname(__DIR__) ."/web{$fileName}{$ext} -ss 00:00:00 -t 00:00:10 -acodec copy ".dirname(__DIR__)."/web{$fileName}_10s{$ext}";

            if (move_uploaded_file($_FILES['ExpertComments']['tmp_name']['video'], dirname(__DIR__).'/web'.$fileName.$ext) && $expertCommentModel->save()) {
                exec($command);
                Yii::$app->session->setFlash('success', "保存成功");
                return $this->redirect(['abordcase/index']);
            }else{
                Yii::$app->session->setFlash('error', "专家点评保存失败");
                $this->goFrom();
            }

        }

        //申请历程
        $courseArr = Course::find()->where(['user_id'=>$caseModel->user_id, 'case_id'=>$case_id])->asArray()->all();
        $courseModel = new Course();

        return $this->render("update2", [
            'caseModel' => $caseModel,
            'courseArr' => $courseArr,
            'courseModel' => $courseModel,
            'expertCommentModel' => $expertCommentModel
        ]);
    }

    /**
     * Deletes an existing AbordCase model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionChangestatus()
    {
        $gets = Yii::$app->request->get();
        $case_id = $gets['case_id'];
        $status = $gets['status'];
        $model = $this->findModel($case_id);
        $model->status = $status;
        if($model->save()){
            Yii::$app->session->setFlash('success', "修改成功");
        }else{
            Yii::$app->session->setFlash('error', '修改失败');
        }
        $this->goFrom();
    }

    /**
     * Finds the AbordCase model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AbordCase the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AbordCase::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
