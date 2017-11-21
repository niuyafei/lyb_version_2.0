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
	public function actionReturnurl()
	{
		require_once(dirname(dirname(__FILE__)) . "/web/qq_connect/comm/config.php");
		if($_REQUEST['state'] == $_SESSION['state'])
		{
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
		}
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
		var_dump($user);
		if (isset($user->error))
		{
			echo "<h3>error:</h3>" . $user->error;
			echo "<h3>msg  :</h3>" . $user->error_description;
			exit;
		}
		//set openid to session
		$_SESSION["openid"] = $user->openid;
	}
}