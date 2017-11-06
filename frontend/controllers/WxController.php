<?php
namespace frontend\controllers;

use common\models\LoginForm;
use frontend\models\SignupForm;
use Yii;
use yii\web\Controller;
use common\models\User;

/**
 * Weixin controller
 */
class WxController extends Controller
{
    private $appId = 'wxd66fddd82cb463cb';
    private $appSecret = '301b614ea571ded677add47b31f39af8';
    
//    public function beforeAction($action)
//    {
//        $data = file_get_contents('access_token.json');
//        $data = json_decode($data);
//        if($data->expires_in < time()+7000){
//            $accessToekUrl = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$this->appId.'&secret='.$this->appSecret;
//            $re = file_get_contents($accessToekUrl);
//            $re = json_decode($re);
//            $re->expires_in = time()+$re->expires_in;
//            file_put_contents('access_token.json', json_encode($re));
//        }
//        return true;
//    }

    public function actionGetCode()
    {
        $code = $_REQUEST['code'];
        $state = $_REQUEST['state'];
        $cookies = Yii::$app->request->cookies;
        if(!$cookies->has('openid')){
            $re = $this->getAccessToken($code);
            $userInfo = $this->getUserInfo($re);
            $openid = $userInfo['openid'];
            if(!$openid) throw new exception(404, "ERROE");
            $cookies = Yii::$app->response->cookies;
            $cookies->add(new \yii\web\Cookie([
                'name' => 'openid',
                'value' => $openid,
            ]));
        }else{
            $openid = $cookies->getValue('openid');
        }

        if(User::find()->where(['openId' => $openid])->exists()){
            $model = User::find()->where(['openId' => $openid])->one();
        }else{
            $userInfo = $this->getUserInfoByopenId($openid);
            $model = new User();
            $model->username = $userInfo['openid'];
            $model->nickname = $userInfo['nickname'];
            $model->openId = $openid;
            $model->auth_key = Yii::$app->security->generateRandomString();
            $model->password_hash = Yii::$app->security->generatePasswordHash('123456');
            $model->headImgUrl = $userInfo['headimgurl'];
            $model->gender = $userInfo['sex'];
            $model->save();
        }
        $loginForm = new LoginForm();
        $loginForm->username = $openid;
        $loginForm->password = "123456";
        $loginForm->rememberMe = true;
        if($loginForm->login()){
            return $this->redirect(['site/index']);
        }
    }
    
    public function getAccessToken($code)
    {
//        $data = file_get_contents("access_token.json");
//        $data = json_decode($data, true);
//        if($data['expires_in'] > time()){
//            return $data;
//        }else{
//            $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid={appid}&secret={secret}&code={code}&grant_type=authorization_code';
//            $url = str_replace('{appid}', $this->appId, $url);
//            $url = str_replace('{secret}', $this->appSecret, $url);
//            $url = str_replace('{code}', $code, $url);
//            $re = file_get_contents($url);
//            $json = [
//                "access_token" => $re['access_token'],
//                "expires_in" => time() + $re['expires_in'],
//            ];
//            file_put_contents("access_token.json", json_encode($json));
//            return $re;
//        }
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid={appid}&secret={secret}&code={code}&grant_type=authorization_code';
        $url = str_replace('{appid}', $this->appId, $url);
        $url = str_replace('{secret}', $this->appSecret, $url);
        $url = str_replace('{code}', $code, $url);
        $re = file_get_contents($url);
        $re = json_decode($re, true);
        $json = [
                "access_token" => $re['access_token'],
                "expires_in" => time() + $re['expires_in'],
            ];
        file_put_contents("access_token.json", json_encode($json));

        return $re;
    }
    
    public function getUserInfo($data)
    {
        $url = 'https://api.weixin.qq.com/sns/userinfo?access_token={ACCESS_TOKEN}&openid={OPENID}&lang=zh_CN';
        $url = str_replace('{ACCESS_TOKEN}', $data['access_token'], $url);
        $url = str_replace('{OPENID}', $data['openid'], $url);
        
        $re = file_get_contents($url);
        return json_decode($re, true);
    }

    public function actionTest()
    {
        $data = file_get_contents("access_token.json");
        $data = json_decode($data, true);
        $accessToken = $data['access_token'];
        $cookies = Yii::$app->request->cookies;
        $openid = $cookies->getValue('openid');
        $url = 'https://api.weixin.qq.com/sns/userinfo?access_token={ACCESS_TOKEN}&openid={OPENID}&lang=zh_CN';
        $url = str_replace('{ACCESS_TOKEN}', $accessToken, $url);
        $url = str_replace('{OPENID}', $openid, $url);
        $re = file_get_contents($url);
        $userInfo = json_decode($re, true);
        var_dump($userInfo);
    }

    public function getUserInfoByopenId($openId)
    {
        $data = file_get_contents("access_token.json");
        $data = json_decode($data, true);
        $accessToken = $data['access_token'];
        $url = 'https://api.weixin.qq.com/sns/userinfo?access_token={ACCESS_TOKEN}&openid={OPENID}&lang=zh_CN';
        $url = str_replace('{ACCESS_TOKEN}', $accessToken, $url);
        $url = str_replace('{OPENID}', $openId, $url);
        $re = file_get_contents($url);
        $userInfo = json_decode($re, true);
        return $userInfo;
    }
}