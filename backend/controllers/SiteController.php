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
//                    'logout' => ['post'],
//                ],
//            ],
//        ];
//    }

    /**
     * @inheritdoc
     */
//    public function actions()
//    {
//        return [
//            'error' => [
//                'class' => 'yii\web\ErrorAction',
//            ],
//        ];
//    }

    public function beforeAction($action)
    {
        if(Yii::$app->user->isGuest){
            $controller = $this->action->controller->id;
            $action = $this->action->id;
            if($controller == "site" && ($action == "login" || $action == "repassword")){
                return true;
            }
            return $this->redirect(['site/login']);
        }
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
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
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
}
