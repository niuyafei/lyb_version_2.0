<?php

namespace backend\controllers;

use Yii;
use common\models\ExpertComments;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExpertcommentsController implements the CRUD actions for ExpertComments model.
 */
class ExpertcommentsController extends Controller
{
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
     * Lists all ExpertComments models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ExpertComments::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ExpertComments model.
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
     * Creates a new ExpertComments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $user_id = Yii::$app->request->get("user_id", "");
        $case_id = Yii::$app->request->get("case_id", "");
        $model = new ExpertComments();
        if($data = Yii::$app->request->post()){
            $model->load($data);
            $model->created_at = date("Y-m-d H:i:s");
            $name = $_FILES['ExpertComments']['name']['video'];
            $ext = mb_substr($name, mb_strrpos($name, '.', 'utf-8'), mb_strlen($name, "utf-8"), "utf-8");
            $path = "/Uploads/videos/";
            $fileName = $path . "expert_comments_" . time();

            $model->video = $fileName . $ext;
            $command = "/usr/local/bin/ffmpeg -i " . dirname(__DIR__) ."/web{$fileName}{$ext} -ss 00:00:00 -t 00:00:10 -acodec copy ".dirname(__DIR__)."/web{$fileName}_10s{$ext}";

            if (move_uploaded_file($_FILES['ExpertComments']['tmp_name']['video'], dirname(__DIR__).'/web'.$fileName.$ext) && $model->save()) {
                exec($command);
                Yii::$app->session->setFlash('success', "保存成功");
                return $this->redirect(['abordcase/index']);
//                return $this->redirect(['view', 'id' => $model->comment_id]);
            }

        }
        return $this->render('create', [
            'model' => $model,
            'user_id' => $user_id,
            'case_id' => $case_id
        ]);

    }

    /**
     * Updates an existing ExpertComments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->comment_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ExpertComments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ExpertComments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ExpertComments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ExpertComments::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionTest()
    {
        $command = "/usr/local/bin/ffmpeg -i /Applications/MAMP/htdocs/advanced/backend/web/Uploads/videos/expert_comments_1508867224.mp3 -ss 00:00:00 -t 00:00:10 -acodec copy /Applications/MAMP/htdocs/advanced/backend/web/Uploads/videos/expert_comments_1508867224_10s.mp3 2>&1";
        exec($command, $output, $return_val);
        var_dump($output);
        var_dump($return_val);
    }
}
