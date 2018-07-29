<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orderdetails".
 *
 * @property int $Id
 * @property string $FirstName
 * @property string $LastName
 * @property string $Email
 * @property string $Country
 * @property int $PostCode
 * @property string $Address
 * @property string $City
 * @property string $PhoneNumber
 *
 * @property Order[] $orders
 */
class Orderdetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orderdetails';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['FirstName', 'LastName', 'Email', 'PostCode', 'Address', 'City', 'PhoneNumber'], 'required'],
            [['PostCode'], 'integer'],
            [['FirstName', 'LastName'], 'string', 'max' => 200],
            [['Email', 'Country', 'City', 'PhoneNumber'], 'string', 'max' => 350],
            [['Address'], 'string', 'max' => 1500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'FirstName' => 'First Name',
            'LastName' => 'Last Name',
            'Email' => 'Email',
            'Country' => 'Country',
            'PostCode' => 'Post Code',
            'Address' => 'Address',
            'City' => 'City',
            'PhoneNumber' => 'Phone Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['OrderDetailsId' => 'Id']);
    }
}
