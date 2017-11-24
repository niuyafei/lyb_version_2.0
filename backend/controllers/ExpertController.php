<?php

namespace backend\controllers;

use PHPUnit\Framework\Exception;
use Yii;
use common\models\Expert;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Upload;
use yii\web\UploadedFile;
use backend\base\BaseController;
use yii\data\Pagination;

/**
 * ExpertController implements the CRUD actions for Expert model.
 */
class ExpertController extends BaseController
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
     * Lists all Expert models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = Expert::find();
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => $this->pageSize,
        ]);
        $data = $query->offset($pages->offset)->limit($pages->limit)->all();
        $model = new Expert();

        return $this->render('index', [
            'data' => $data,
            'pages' => $pages,
            'model' => $model
        ]);
    }

    /**
     * Displays a single Expert model.
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
     * Creates a new Expert model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Expert();

        if ($data = Yii::$app->request->post()) {
            $model->load($data);
            $model->created_at = date("Y-m-d H:i:s");
            $filename = $_FILES['Expert']['name']['headimgurl'];
            $ext = mb_substr($filename, strrpos($filename, '.'));
            $path = "/Uploads/headImgs/";
            $name = "collegenode_expert_" . time() . $ext;
            $model->headimgurl = $path . $name;

            if(move_uploaded_file($_FILES['Expert']['tmp_name']['headimgurl'], dirname(__DIR__) . '/web' . $path . $name) && $model->save()){
                Yii::$app->session->setFlash("success", "保存成功");
                return $this->redirect(['index']);
//                return $this->redirect(['view', 'id' => $model->expert_id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Expert model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($data =Yii::$app->request->post()) {
            unset($data['Expert']['headimgurl']);
            $model->load($data);
            if($_FILES['Expert']['name']['headimgurl']){
                $filename = $_FILES['Expert']['name']['headimgurl'];
                $ext = mb_substr($filename, strrpos($filename, '.'));
                $path = "/Uploads/headImgs/";
                $name = "collegenode_expert_" . time() . $ext;
                $model->headimgurl = $path . $name;
                move_uploaded_file($_FILES['Expert']['tmp_name']['headimgurl'], dirname(__DIR__) . '/web' . $path . $name);
            }


            if($model->save()){
                Yii::$app->session->setFlash('success', "更新成功");
            }else{
                Yii::$app->session->setFlash('error', "更新失败");
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Expert model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionRemove()
    {
        $id = Yii::$app->request->get("id");
        $this->findModel($id)->delete();

        return $this->goFrom();
    }

    /**
     * Finds the Expert model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Expert the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Expert::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
