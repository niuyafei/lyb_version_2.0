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
            if($controller == "site" && ($action == "login" || $action == "repassword")){
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
}
