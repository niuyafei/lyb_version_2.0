<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/11/20
 * Time: 下午11:09
 */
namespace frontend\controllers;

use common\models\User;
use yii;
use frontend\base\BaseController;
use common\models\LoginForm;

class QqController extends BaseController
{
	public function actionReturnurl()
	{
		require_once(dirname(dirname(__FILE__)) . "/web/qq_connect/comm/config.php");
//		if($_REQUEST['state'] == $_SESSION['state']) {
			$token_url = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&"
				. "client_id=" . $_SESSION["appid"]. "&redirect_uri=" . urlencode($_SESSION["callback"])
				. "&client_secret=" . $_SESSION["appkey"]. "&code=" . $_REQUEST["code"];

			$response = file_get_contents($token_url);
			if (strpos($response, "callback") !== false)
			{
				$lpos = strpos($response, "(");
				$rpos = strrpos($response, ")");
				$response  = substr($response, $lpos + 1, $rpos - $lpos -1);
				$msg = json_decode($response);
				if (isset($msg->error))
				{
					echo "<h3>error:</h3>" . $msg->error;
					echo "<h3>msg  :</h3>" . $msg->error_description;
					exit;
				}
			}

			$params = array();
			parse_str($response, $params);

			//debug
			//print_r($params);

			//set access token to session
			$_SESSION["access_token"] = $params["access_token"];

			$this->getOpenId();
			if(User::find()->where(['openid' => $_SESSION['openid']])->exists()){
				$model = User::find()->where(['openid' => $_SESSION['openid']])->one();
			}else{
				$userInfo = $this->getUserInfo();
				$model = new User();
				$model->username = $_SESSION['openid'];
				$model->nickname = $userInfo['nickname'];
				$model->openId = $_SESSION['openid'];
				$model->auth_key = Yii::$app->security->generateRandomString();
				$model->password_hash = Yii::$app->security->generatePasswordHash('123456');
				$model->headImgUrl = $userInfo['figureurl'];
				$model->gender = ($userInfo['gender'] == '男' ? 1 : 2);
				$model->save();
			}
			$loginForm = new LoginForm();
			$loginForm->username = $_SESSION['openid'];
			$loginForm->password = "123456";
			$loginForm->rememberMe = true;
			return $this->redirect(['site/index']);
//		}
	}

	public function getOpenId()
	{
		$graph_url = "https://graph.qq.com/oauth2.0/me?access_token="
			. $_SESSION['access_token'];

		$str  = file_get_contents($graph_url);
		if (strpos($str, "callback") !== false)
		{
			$lpos = strpos($str, "(");
			$rpos = strrpos($str, ")");
			$str  = substr($str, $lpos + 1, $rpos - $lpos -1);
		}

		$user = json_decode($str);
		if (isset($user->error))
		{
			echo "<h3>error:</h3>" . $user->error;
			echo "<h3>msg  :</h3>" . $user->error_description;
			exit;
		}
		//set openid to session
		$_SESSION["openid"] = $user->openid;
	}

	public function getUserInfo(){
		require_once(dirname(dirname(__FILE__)) . "/web/qq_connect/comm/config.php");
		$get_user_info = "https://graph.qq.com/user/get_user_info?"
			. "access_token=" . $_SESSION['access_token']
			. "&oauth_consumer_key=" . $_SESSION["appid"]
			. "&openid=" . $_SESSION["openid"]
			. "&format=json";

		$info = file_get_contents($get_user_info);
		$arr = json_decode($info, true);

		return $arr;
	}
}