<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 7/27/2018
 * Time: 10:36 AM
 */

namespace app\controllers;
 
use app\models\Login;
use yii\web\Controller;
use Yii;

class AdminpanelController extends Controller
{

    public function actionIndex()
    {

        if(Yii::$app->user->isGuest)
            $this->redirect("/adminpanel/login");

        return $this->render('index');
    }

    public function beforeAction($action)
    {
        $this->layout = '@app/views/layouts/adminpanel';

        return parent::beforeAction($action);
    }

    public function actionLogin(){

        if(!Yii::$app->user->isGuest    )
            $this->redirect("/adminpanel/index");

        $login = new Login();

        if(Yii::$app->request->post('Login')){

            $this->OnLogin($login);
        }

        return $this->render("login", ['loginModel'=>$login]);
    }

    public function actionLogout(){

        Yii::$app->user->logout();

        $this->redirect("/adminpanel/login");
    }

    /**
     * @param $login
     */
    protected function OnLogin($login)
    {
        $login->attributes = Yii::$app->request->post('Login');

        if ($login->validate()) {

            Yii::$app->user->login($login->getUser($login->email));

            $this->redirect("/adminpanel/index");

        }
    }

}