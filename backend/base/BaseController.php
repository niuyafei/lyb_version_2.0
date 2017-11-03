<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/11/1
 * Time: 下午9:54
 */
namespace backend\base;

use yii;
use yii\web\Controller;

class BaseController extends Controller
{
	public function goFrom($url=null)
	{
		if(is_null($url)){
			$url = Yii::$app->request->referrer;
		}
		echo "<script>window.location.href='".$url."'</script>";
	}

	/**
	 * 提示消息
	 * @param string $message
	 * @param string $url
	 * @return string
	 */
	public function showMessage($message = '', $url = '')
	{
		$url = $url ? $url : '/site/index';
		return $this->render('@backend/views/message', ['message' => $message, 'url' => $url]);
	}

	/**
	 * 错误提示信息
	 * @param string $message
	 * @param string $url
	 * @return string
	 */
	public function showError($message = '', $url = '')
	{
		$url = $url ? $url : '/site/index';
		return $this->render('@backend/views/error', ['message' => $message, 'url' => $url]);
	}
}