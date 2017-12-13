<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\LoginForm;
use backend\models\Admin;
use yii\data\Pagination;
use backend\models\AddUserForm;
use yii\captcha\CaptchaAction;


/**
 * Site controller
 */
class SiteController extends Controller
{
    private $allow = ['login', 'repassword', 'verify-code', 'check', 'send', 'changepassword'];

    /**
     * @inheritdoc
     */
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    [
//                        'actions' => ['login', 'error'],
//                        'allow' => true,
//                    ],
//                    [
//                        'actions' => ['logout', 'index'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['get'],
//                ],
//            ],
//        ];
//    }

    public function beforeAction($action)
    {
        if(!Yii::$app->session->get('userId')){
            $controller = $this->action->controller->id;
            $action = $this->action->id;
            if($controller == "site" && in_array($action, $this->allow)){
                return true;
            }
            return $this->redirect(['site/login']);
        }
        parent::beforeAction($action);
        return true;
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $query = Admin::find()->where(["not in", "role", [5,6]]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 10,
        ]);
        $data = $query->offset($pages->offset)->limit($pages->limit)->all();
        $addUserForm = new AddUserForm();

        return $this->render('index', [
            'data' => $data,
            'pages' => $pages,
            'addUserForm' => $addUserForm,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $session = Yii::$app->session;
        if ($session->get("userId")) {
            return $this->redirect(['abordcase/index']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $session->set('nickname', $model->_user->nickname);
            $session->set('userId', $model->_user->id);
            $session->set('email', $model->_user->email);
            $session->set('gender', $model->_user->gender);
            $session->set('role', $model->_user->role);

            return $this->redirect(['abordcase/index']);
        } else {
            return $this->renderPartial("login2", [
                "model" => $model
            ]);
        }
    }

    public function actionRepassword()
    {
        if(Yii::$app->request->post()){
            Yii::$app->session->setFlash('error', "当前版本不支持修改密码,请联系管理员修改");
            return $this->redirect(['site/index']);
        }
        return $this->renderPartial("repassword");
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        Yii::$app->session->removeAll();

        return $this->redirect(['site/login']);
    }

    public function actionTest()
    {
        var_dump(date("Y-m-d H:i:s"));
    }

    public function actionVerifyCode()
    {
        $VerifyImg = new \backend\models\VerifyImage();
        $VerifyImg->CreateVerifyImage();
    }

    public function actionCheck()
    {
        $code = Yii::$app->request->get("verifyCode", "");
        if(strtolower($code) == Yii::$app->session->get("verifyCode")){
            Yii::$app->session->remove('verifyCode');
            return true;
        }else{
            return false;
        }
    }

    //发送验证码
    public function actionSend()
    {
        $phone = Yii::$app->request->get("phone", "");
        if($phone){
            $tmpId = "222344";
            $code = rand(1000, 9999);
            Yii::$app->session->set("PhoneVerifyCode", $code);
            $result = \common\SMS\SendSms::sendSms($phone, [$code], $tmpId);
            return true;
        }else{
            return false;
        }
    }

    //修改密码
    public function actionChangepassword()
    {
        //验证手机验证码
        $post = Yii::$app->request->post();
        if($post['phoneCode'] == Yii::$app->session->get('PhoneVerifyCode')){
            if($model = Admin::find()->where(['phone' => $post['phone']])->one()){
                $model->password_hash = Yii::$app->security->generatePasswordHash($post['newPassword']);
                if($model->save()){
                    Yii::$app->session->setFlash('success', "修改成功");
                    return $this->redirect(['site/login']);
                }else{
                    Yii::$app->session->setFlash('error', "修改失败");
                }
            }else{
                //用户不存在
                Yii::$app->session->setFlash('error', "用户不存在");
            }
        }else{
            //短信验证码错误
            Yii::$app->session->setFlash('error', "短信验证码错误");
        }
        return $this->redirect(['site/repassword']);
    }
	
	public function actionTest()
	{
		$tmpId = "222344";
		$code = rand(1000, 9999);
		Yii::$app->session->set("PhoneVerifyCode", $code);
		$result = \common\SMS\SendSms::sendSms($phone, [$code], $tmpId);
		var_dump($result);
	}
}
