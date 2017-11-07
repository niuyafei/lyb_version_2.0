<?php
/**
 * Created by PhpStorm.
 * User: Zhiqiang Guo
 * Date: 2017/8/7
 * Time: 21:20
 */

namespace frontend\controllers;

use yii;
use common\alipay\AlipayNotify;
use common\alipay\AlipaySubmit;
use common\alipay\AlipayTradePagePayContentBuilder;
use yii\web\Controller;

class AlipayController extends Controller
{
    public function actionIndex()
    {
        $config = Yii::$app->params['alipay_config'];
        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = time() . rand(10000, 99999);
        //订单名称，必填
//        $subject = trim($_POST['subject']);
//        //付款金额，必填
//        $total_amount = trim($_POST['amount']);
//        //商品描述，可空
//        $body = trim($_POST['body']);

        $subject = "查看案例";
        $total_amount = 0.01;
        $body = "北京联校传奇信息科技有限公司";

        //构造参数
        $payRequestBuilder = new AlipayTradePagePayContentBuilder();
        $payRequestBuilder->setBody($body);
        $payRequestBuilder->setSubject($subject);
        $payRequestBuilder->setTotalAmount($total_amount);
        $payRequestBuilder->setOutTradeNo($out_trade_no);

        $aop = new AlipayTradeService($config);

        /**
         * pagePay 电脑网站支付请求
         * @param $builder 业务参数，使用buildmodel中的对象生成。
         * @param $return_url 同步跳转地址，公网可以访问
         * @param $notify_url 异步通知地址，公网可以访问
         * @return $response 支付宝返回的信息
         */
        $response = $aop->pagePay($payRequestBuilder,$config['return_url'],$config['notify_url']);

        //输出表单
        var_dump($response);
    }
}