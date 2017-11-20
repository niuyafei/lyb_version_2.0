<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/11/20
 * Time: 下午11:09
 */
namespace frontend\controllers;

use yii;
use frontend\base\BaseController;

class QqController extends BaseController
{
	//qq登陆回调地址
	public function actionNotifyurl()
	{

	}

	public function actionReturnurl()
	{
		var_dump("Hello world");
	}
}