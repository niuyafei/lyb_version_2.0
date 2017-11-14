<?php
/**
 * Created by PhpStorm.
 * User: Zhiqiang Guo
 * Date: 2017/8/7
 * Time: 21:20
 */

namespace frontend\controllers;

use common\models\Payment;
use yii;
use common\alipay\AlipayTradePagePayContentBuilder;
use common\alipay\AlipayTradeService;
use frontend\base\BaseController;

class AlipayController extends BaseController
{

    public $enableCsrfValidation = false;

    /**
     * @desc 支付宝扫码支付
     * @params ['subject', 'amount', 'body', 'case_id', 'payment']
     */
    public function actionIndex()
    {
        if(!$this->isLogin()){
            $this->goFrom();
            exit;
        }
        date_default_timezone_set('PRC');
        $config = Yii::$app->params['alipay_config'];
        $gets = Yii::$app->request->get();
        $case_id = isset($gets['case_id']) ? $gets['case_id'] : null;
        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = time() . rand(10000, 99999);
        //订单名称，必填
        $subject = trim($gets['subject']);
//        //付款金额，必填
        $total_amount = trim($gets['amount']);
        //测试金额0.01
        $total_amount = 0.01;
//        //商品描述，可空
        $body = trim($gets['body']);

        $payment = isset($gets['payment']) ? $gets['payment'] : null;

//        var_dump(Yii::$app->getUser()->identity);
        $model = new Payment();
        $model->user_id = Yii::$app->user->getId();
        $model->case_id = $case_id;
        $model->order_id = $out_trade_no;
        $model->consultation_id = $gets['consultation_id'];
        $model->pay_from = 2;
        $model->amount = $total_amount;
        $model->payment = $payment;
        $model->status = 3;
        $model->created_at = date("Y-m-d H:i:s");
        if(!$model->save()){
            Yii::$app->session->setFlash('error', "订单生产失败");
            $url = Yii::$app->request->referrer;
            echo "<script>window.location.href='".$url."'</script>";
            exit;
        }

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
        echo $response;
    }

    public function actionReturnurl()
    {
        //http://helper.liuyangbang.cn/alipay/returnurl.php?total_amount=0.01&timestamp=2017-11-07+23%3A53%3A54&sign=jqDMurWHSLdnb1a%2F3IbzEWunPmAZGqk90FwS74PLzuTyN4fxuED%2BEappZMG6JgXntGO%2BbLb%2BZR3ikKi4fzz9%2BJW%2BvEJFw8YSyGbZTq6q7prdEZpRLs57zuYgiUUOPZ782GANmaEgo0%2FLCpd7B52l6iX6QzSTAOJnVOt9xZfKclHKkO9RxmetS5znyoCajO4lCSnQP8nuyJEsULZZksrFBJiD3hIQHHlRwe4oSLohJ%2FqLKGUxq1GmvSCgKTSoe%2B0C%2FAGoS658lL8rW0xe4W2wLY01XcL8P%2Fi1whV2C4yOpAh0%2B6%2F%2FfRtElzw1HTFbKVM6U6Z%2FYo%2BRbqA2vpTk1DaliQ%3D%3D&trade_no=2017110721001004240247983106&sign_type=RSA2&auth_app_id=2017110109659857&charset=UTF-8&seller_id=2088111554148912&method=alipay.trade.page.pay.return&app_id=2017110109659857&out_trade_no=151006998795502&version=1.0
        $out_trade_no = Yii::$app->request->get("out_trade_no");
        $model = Payment::find()->where(['order_id' => $out_trade_no])->one();
        if($model->case_id){
            //留学案例、申校列表、专家点评
            return $this->redirect(['abordcase/detail?case_id=' . $model->case_id]);
        }else if($model->payment == 4){
            //预约咨询
            return $this->redirect(['consultation/success']);
        }else if($model->payment == 5){
            //留学规划
            return $this->redirect(['plan/result']);
        }
    }

    public function actionNotifyurl()
    {
        date_default_timezone_set('PRC');
        $config = Yii::$app->params['alipay_config'];
        $arr = Yii::$app->request->post();
//        file_put_contents("test.txt", json_encode($arr));

        $out_trade_no = $_POST['out_trade_no'];
        $trade_no = $_POST['trade_no'];
        $trade_status = $_POST['trade_status'];
        if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
            //交易成功
            $model = Payment::find()->where(['order_id'=>$out_trade_no])->one();
            $model->status = 1;
            $model->save();
            echo "success";
        }else{
            //交易失败
            $model = Payment::find()->where(['order_id'=>$out_trade_no])->one();
            $model->status = 2;
            $model->save();
            echo "fail";
        }

//        $alipaySevice = new AlipayTradeService($config);
//        $result = $alipaySevice->check($arr);
//        if($result){
//            //验签成功
//            //商户订单号
//            $out_trade_no = $_POST['out_trade_no'];
//            //支付宝交易号
//            $trade_no = $_POST['trade_no'];
//            //交易状态
//            $trade_status = $_POST['trade_status'];
//            if($_POST['trade_status'] == 'TRADE_FINISHED') {
//                //交易结束
//            }
//            else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
//                //交易成功
//                $model = Payment::find()->where(['order_id'=>$out_trade_no])->one();
//                $model->status = 1;
//                $model->save();
//            }else{
//                //交易失败
//                $model = Payment::find()->where(['order_id'=>$out_trade_no])->one();
//                $model->status = 2;
//                $model->save();
//            }
//            echo "success";
//        }else{
//            //验签失败
//            echo "fail";
//        }
    }

    public function actionTest()
    {
        Yii::$app->session->setFlash('error', "hello world");
        Yii::$app->user->setReturnUrl("http://test.collegenode.com/abordcase/detail?case_id=12");
        exit;
    }
}