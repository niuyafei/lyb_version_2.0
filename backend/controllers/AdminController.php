<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/11/1
 * Time: 下午9:53
 */

namespace backend\controllers;

use backend\models\Admin;
use yii;
use backend\base\BaseController;

class AdminController extends BaseController
{
	public function actionDelete($id)
	{
		$model = Admin::findOne($id);
		if($model->delete()){
			$this->goFrom();
		}
		return $this->redirect(['site/index']);
	}

	public function actionEdit()
	{
		$gets = Yii::$app->request->get();
		$model = Admin::findOne($gets['id']);
		if(!$model){
			Yii::$app->session->setFlash('error', "参数错误");
			$this->goFrom();
		}
		foreach($gets as $key => $value){
			$model->$key = $value;
		}
		$model->username = $model->email;
		if($model->save()){
			Yii::$app->session->setFlash('error', "更新成功");
			$this->goFrom();
		}else{
			Yii::$app->session->setFlash('error', "保存失败");
			$this->goFrom();
		}
	}

	public function actionAdd()
	{

		$gets = Yii::$app->request->get();
		if(Admin::find()->where(['username' => $gets['email']])->exists()){
			Yii::$app->session->setFlash('error', "账号已存在");
			$this->goFrom();
			exit;
		}
		$model = new Admin();

		foreach($gets as $key => $value)
		{
			$model->$key = $value;
		}
		$model->username = $gets['email'];
		$model->auth_key = Yii::$app->security->generateRandomString();
		$model->password_hash = Yii::$app->getSecurity()->generatePasswordHash("123456");
		$model->created_at = date("Y-m-d H:i:s");

		if($model->save()){
			Yii::$app->session->setFlash('error', "保存成功");
			$this->goFrom();
		}else{
			Yii::$app->session->setFlash('error', "保存失败");
			$this->goFrom();
		}
	}
}