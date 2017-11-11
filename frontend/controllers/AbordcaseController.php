<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/10/24
 * Time: 下午10:02
 */
namespace frontend\controllers;

use common\models\AbordCase;
use Yii;
use frontend\base\BaseController;
use common\models\Payment;

class AbordcaseController extends BaseController
{
	public function actionDetail($case_id)
	{
		$user_id = Yii::$app->user->getId();
		$model = AbordCase::find()->with("user")->where(['case_id' => $case_id])->one();
		if(!is_object($model->expertComments)){
			Yii::$app->session->setFlash('error', "留学案例生成失败，请联系管理员");
			return $this->redirect(['site/index']);
		}
		$casePayment = Payment::find()->where(['case_id' => $model->case_id, 'payment' => 1, 'status'=>1, 'user_id' => $user_id])->one();
		$schoolPayment = Payment::find()->where(['case_id' => $model->case_id, 'payment' => 3, 'status'=>1, 'user_id' => $user_id])->one();
		$expertPayment = Payment::find()->where(['case_id' => $model->case_id, 'payment' => 2, 'status'=>1, 'user_id' => $user_id])->one();

		$audio = isset($model->expertComments->video) ? $model->expertComments->video : "";
		if(!$expertPayment){
			$audioName = mb_substr($audio, 0, mb_strrpos($audio, "."), "utf-8");
			$ext = mb_substr($audio, mb_strrpos($audio, "."));
			$audio = $audioName . "_10s" . $ext;
		}

		return $this->render("detail", [
			'model' => $model,
			'casePayment' => is_object($casePayment) ? $casePayment : "",
			'schoolPayment' => is_object($schoolPayment) ? $schoolPayment : "",
			'audio' => $audio
		]);
	}
}