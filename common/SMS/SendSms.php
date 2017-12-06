<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/12/6
 * Time: 下午9:51
 */
namespace common\SMS;

class SendSms
{
	public static function sendSms($to, $datas, $tempId)
	{
		include_once("CCPRestSmsSDK.php");
		$accountSid= 'aaf98f894c5a7f75014c6884da9c062d';
		$accountToken= 'a29515a5effa4f00aa3ee76437968754';
		$appId='8a216da86010e690016025c5172606e1';
		$serverIP='app.cloopen.com';
		$serverPort='8883';
		$softVersion='2013-12-26';

		$rest = new \REST($serverIP,$serverPort,$softVersion);
		$rest->setAccount($accountSid,$accountToken);
		$rest->setAppId($appId);

		$result = $rest->sendTemplateSMS($to,$datas,$tempId);
		if($result == NULL){
			return false;
		}else{
			return $result;
		}
	}
}