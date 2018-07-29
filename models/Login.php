<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 7/28/2018
 * Time: 2:10 PM
 */

namespace app\models;

use Yii;
use yii\base\Model;

class Login extends Model
{
    public $email;
    public $password;

    public function rules(){
        return [
            [['email','password'],'required'],
            ['email','email'],
            ['password','validatePassword']
        ];
    }

    public function validatePassword($attribute,$params){

        $user = $this->getUser($this->email);

        if(!$user || ($user->Password!=$this->password))
            $this->addError($attribute,"Authorization failed");

    }

    public function getUser($email){
        return Account::findOne(['Email'=>$this->email]);
    }

}