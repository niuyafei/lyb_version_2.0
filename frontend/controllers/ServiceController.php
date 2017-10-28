<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/10/28
 * Time: 上午2:24
 */

namespace frontend\controllers;

use yii;
use yii\web\Controller;
use frontend\models\ServiceForm;
use common\models\Service;

class ServiceController extends Controller
{
	//背景提升
	public function actionIndex()
	{
		$model = new ServiceForm();

		return $this->render("index", [
			'model' => $model
		]);
	}

	//面试特训
	public function actionInterview()
	{
		$model = new ServiceForm();

		return $this->render("interview", [
			'model' => $model
		]);
	}

	//夏校项目
	public function actionSummer()
	{
		$model = new ServiceForm();

		return $this->render("summer", [
			'model' => $model
		]);
	}

	//实习项目
	public function actionPractice()
	{
		$model = new ServiceForm();

		return $this->render("practice", [
			'model' => $model
		]);
	}

	public function actionCreate()
	{
		$model = new Service();
		if($model->load(Yii::$app->request->post())){
			$model->user_id = Yii::$app->user->getId();
			$model->created_at = date("Y-m-d H:i:s");
			if($model->validate() && $model->save()){
				return true;
			}
		}
		return false;
	}
}