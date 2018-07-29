<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 7/27/2018
 * Time: 7:15 PM
 */

namespace app\controllers;

include_once   \Yii::$app->basePath."\Servises\AccountSessionService.php";

use app\models\Book;
use yii\web\Controller;

class CartController extends  Controller
{

    public function actionAddtocart($Id){

        $book = Book::find()->where(['Id'=>$Id])->one();

        ProcessSessionAdd($book);

        $this->redirect(array('shop/details','id'=>$book->Id));
    }

    public function actionRemovefromcart($Id){

        ProcessSessionDelete($Id);

        return "Ok";
    }
}