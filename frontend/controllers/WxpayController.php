<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/11/8
 * Time: 下午11:05
 */
namespace frontend\controllers;

use yii;
use frontend\base\BaseController;
use common\models\Payment;

class WxpayController extends BaseController
{
	public $enableCsrfValidation = false;

	public function actionIndex()
	{
		if(!$this->isLogin()){
			$this->goFrom();
			exit;
		}
		date_default_timezone_set('Asia/Shanghai');

		require_once(__DIR__."/../web/wxpay/WxPay.Api.php");
		require_once(__DIR__."/../web/WxPay.NativePay.php");

		//array(5) { ["case_id"]=> string(1) "9" ["subject"]=> string(12) "留学案例" ["amount"]=> string(1) "5" ["body"]=> string(42) "北京联校传奇信息科技有限公司" ["payment"]=> string(1) "1" }
		$gets = Yii::$app->request->get();
		$case_id = isset($gets['case_id']) ? $gets['case_id'] : null;
		$payment = $gets['payment'];
		$body = $gets['subject'];
		$trade_no = 'lyb' . time().rand(100, 99);
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
		$input->SetOut_trade_no($trade_no);
		$input->SetTotal_fee($total_fee);
		$input->SetTime_start(date("YmdHis"));
		$input->SetTime_expire(date("YmdHis", time() + 600));
		$input->SetGoods_tag("留样帮-申校系统2.0");
		$input->SetNotify_url("http://helper.liuyangbang.cn/wxpay/notifyurl");
		$input->SetTrade_type("NATIVE");
		$input->SetProduct_id("");
		$result = $notify->GetPayUrl($input);
		$url2 = $result["code_url"];

		return $this->renderPartial("index", [
			'url' => $url2,
			'case_id' => $case_id,
			'out_trade_no' => $trade_no
		]);
	}

	public function actionNotifyurl()
	{
		$postStr = Yii::$app->request->getRawBody();
		$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
		if ($postObj === false || $postObj->return_code != 'SUCCESS') {
			echo "FAIL";
		}
		$trade_no = $postObj->out_trade_no;
		$model = Payment::find()->where(['order_id' => $trade_no])->one();
		if($model->status == 1){
			echo "SUCCESS";
		}else{
			$model->status = 1;
			if($model->save()){
				echo "SUCCESS";
			}else{
				echo "FAIL";
			}
		}

	}

	public function actionIspayment()
	{
		$gets = Yii::$app->request->get();
		$out_trade_no = $gets['out_trade_no'];
		if(Payment::find()->where(['order_id' => $out_trade_no, 'status' => 1])->exists()){
			echo 'true';
		}else{
			echo 'false';
		}

	}

	public function actionTest()
	{
		echo "true";
	}
}