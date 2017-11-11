<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/11/8
 * Time: 下午11:05
 */
namespace frontend\controllers;

use yii;
use yii\web\Controller;
use common\models\Payment;

class WxpayController extends Controller
{
	public $enableCsrfValidation = false;

	public function actionIndex()
	{
		date_default_timezone_set('Asia/Shanghai');

		require_once(__DIR__."/../web/wxpay/WxPay.Api.php");
		require_once(__DIR__."/../web/WxPay.NativePay.php");

		//array(5) { ["case_id"]=> string(1) "9" ["subject"]=> string(12) "留学案例" ["amount"]=> string(1) "5" ["body"]=> string(42) "北京联校传奇信息科技有限公司" ["payment"]=> string(1) "1" }
		$gets = Yii::$app->request->get();
		$case_id = isset($gets['case_id']) ? $gets['case_id'] : null;
		$payment = $gets['payment'];
		$body = $gets['subject'];
		$trade_no = time().rand(10000, 99999);
		$total_fee = $gets['amount'] * 100;
		$total_fee = 1;

		$paymentModel = new Payment();
		$paymentModel->case_id = $case_id;
		$paymentModel->user_id = Yii::$app->user->getId();
		$paymentModel->order_id = $trade_no;
		$paymentModel->pay_from = 1;
		$paymentModel->amount = $total_fee;
		$paymentModel->payment = $payment;
		$paymentModel->status = 3;
		$paymentModel->created_at = date("Y-m-d H:i:s");
		if(!$paymentModel->save()){
			Yii::$app->session->setFlash('error', "订单生成失败");
			return $this->redirect(['abordcase/detail?case_id=' . $case_id]);
		}


		$notify = new \NativePay();
		$input = new \WxPayUnifiedOrder();
		$input->SetBody($body);
		$input->SetOut_trade_no(\WxPayConfig::MCHID.date("YmdHis"));
		$input->SetTotal_fee($total_fee);
		$input->SetTime_start(date("YmdHis"));
		$input->SetTime_expire(date("YmdHis", time() + 600));
		$input->SetGoods_tag("留样帮-申校系统2.0");
		$input->SetNotify_url("http://helper.liuyangbang.cn/wxpay/notifyurl");
		$input->SetTrade_type("NATIVE");
		$input->SetProduct_id($trade_no);
		$result = $notify->GetPayUrl($input);
		$url2 = $result["code_url"];

		return $this->renderPartial("index", [
			'url' => $url2
		]);
	}

	public function actionNotifyurl()
	{
		$postStr = Yii::$app->request->getRawBody();
		file_put_contents("test.txt", $postStr);
		exit;
		$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
		if ($postObj === false) {
			die('parse xml error');
		}
		if ($postObj->return_code != 'SUCCESS') {
			die($postObj->return_msg);
		}
	}

	public function actionIspayment()
	{
		date_default_timezone_set('Asia/Shanghai');
		require_once(__DIR__."/../web/wxpay/WxPay.Api.php");
		$gets = Yii::$app->request->get();
		$out_trade_no = $gets['out_trade_no'];
		$input = new \WxPayOrderQuery();
		$input->SetOut_trade_no($out_trade_no);
		var_dump(\WxPayApi::orderQuery($input));
		exit();

	}
}