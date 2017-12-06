<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/10/28
 * Time: 上午2:24
 */

namespace frontend\controllers;

use yii;
use frontend\base\BaseController;
use frontend\models\ServiceForm;
use common\models\Service;

class ServiceController extends BaseController
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
		date_default_timezone_set("PRC");
		if(!$this->isLogin()){
			return $this->redirect(["index"]);
		}

		$model = new Service();
		if($model->load(Yii::$app->request->post())){
			$model->user_id = Yii::$app->user->getId();
			$model->created_at = date("Y-m-d H:i:s");
			if($model->validate() && $model->save()){
				//发送短信给超级管理员
				$to = \common\models\Admin::find()->select("phone")->where(['role' => 4])->asArray()->all();
				$to = \yii\helpers\ArrayHelper::getColumn($to, "phone");
				$to = implode(",", $to);
				$tempId = 221986;
				$data = [$model->username, date('Y'), date('m'), date('d'), date('H'), date('i'), Service::dropDown($model->type), $model->phone];

				$result = \common\SMS\SendSms::sendSms($to, $data, $tempId);
				return true;
			}
		}
		return false;
	}
}