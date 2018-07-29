<?php

namespace app\components;
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 7/27/2018
 * Time: 12:21 PM
 */
use yii\base\Behavior;

class SessionService extends Behavior
{
    public function events(){
        return[
            \yii\web\Application::EVENT_AFTER_REQUEST=>'processSession',
        ];
    }

    public function processSession(){
        echo "Ok";
    }
}