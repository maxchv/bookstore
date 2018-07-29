<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 7/27/2018
 * Time: 6:18 PM
 */

namespace app\controllers;

include_once   \Yii::$app->basePath."\Servises\AccountSessionService.php";

use app\models\Order;
use app\models\Orderdetails;
use Yii;
use yii\web\Controller;

class OrderController extends Controller
{
    public function actionIndex(){

        $orderDetails = new Orderdetails();


        $myarr =  getCartItems();

        if( isset($_POST["FirstName"])) {
            $orderDetails->FirstName = $_POST["FirstName"];
            $orderDetails->LastName = $_POST["LastName"];
            $orderDetails->Email = $_POST["Email"];
            $orderDetails->Address = $_POST["Address"];
            $orderDetails->PostCode = $_POST["PostCode"];
            $orderDetails->Country = $_POST["Country"];
            $orderDetails->City = $_POST["City"];
            $orderDetails->PhoneNumber = $_POST["PhoneNumber"];

            $orderDetails->save();

            foreach ($myarr as $key=>$val) {

                $order = new Order();

                $order->PHPSESSID = Yii::$app->session->getId();
                $order->OrderDetailsId = $orderDetails->Id;
                $order->BookId = $val->Id;

                if ($order->validate()) {
                    $order->save();
                } else {
                    $errors = $order->errors;
                    var_dump($errors);
                }

            }

            clearCart();

             $myarr=null;
        }

        return $this->render("index",['items'=>$myarr]);

    }

}