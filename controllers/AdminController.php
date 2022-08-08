<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class AdminController extends Controller
{

    //Контроль доступа не реализован через rbac тк. в проекте две роли администратора и посетитиля
    public function beforeAction($action)
    {
       if (!Yii::$app->user->isGuest && Yii::$app->user->identity->admin==1){
           return true;
       }else{
           $this->redirect(['/site/login/']);
           $this->redirect(['/site/login/']);
           return false;
       }
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    /**
     * Count unsolved problems .
     *
     * @return string
     */
    public function actionCounter()
    {
        $unsloved_questions = \app\models\FeedbackForm::find()->where(['is_solved'=>0])->count();
        return Yii::$app->response->content = $unsloved_questions;
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

}
