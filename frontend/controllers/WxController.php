<?php
namespace frontend\controllers;

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
    
    public function beforeAction($action)
    {
        $data = file_get_contents('access_token.json');
        $data = json_decode($data);
        if($data->expires_in < time()+7000){
            $accessToekUrl = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$this->appId.'&secret='.$this->appSecret;
            $re = file_get_contents($accessToekUrl);
            $re = json_decode($re);
            $re->expires_in = time()+$re->expires_in;
            file_put_contents('access_token.json', json_encode($re));
        }
        return true;
    }

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
        
        // if(!User::find()->where(['openid'=>$openid])->exists()){
        //     $model = new User();
        //     $model->openid = $openid;
        //     $model->nickname = $userInfo['nickname'];
        //     $model->headimgurl = $userInfo['headimgurl'];
        //     $model->created_at = date('Y-m-d H:i:s');
        //     if(!$model->save()) throw new exception("SAVE ERROR");
        // }

        var_dump($openid);
        // $this->redirect(["site/$state", 'openid'=>$openid]);
    }
    
    public function getAccessToken($code)
    {
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid={appid}&secret={secret}&code={code}&grant_type=authorization_code';
        $url = str_replace('{appid}', $this->appid, $url);
        $url = str_replace('{secret}', $this->secret, $url);
        $url = str_replace('{code}', $code, $url);
        $re = file_get_contents($url);
        return json_decode($re, true);
    }
    
    public function getUserInfo($data)
    {
        $url = 'https://api.weixin.qq.com/sns/userinfo?access_token={ACCESS_TOKEN}&openid={OPENID}&lang=zh_CN';
        $url = str_replace('{ACCESS_TOKEN}', $data['access_token'], $url);
        $url = str_replace('{OPENID}', $data['openid'], $url);
        
        $re = file_get_contents($url);
        return json_decode($re, true);
    }
}