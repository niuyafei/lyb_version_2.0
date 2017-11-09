<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/11/9
 * Time: 下午9:13
 */
namespace frontend\base;

use yii;
use yii\web\Controller;

class BaseController extends Controller
{
	public function isLogin()
	{
		if(Yii::$app->user->isGuest){
			Yii::$app->session->setFlash('error', "请登陆后再申请服务");
			return false;
		}else{
			return true;
		}
	}

	public function goFrom($url = null)
	{
		if(is_null($url)){
			$url = Yii::$app->request->referrer;
		}

		echo "<script>window.location.href='".$url."'</script>";
	}
}