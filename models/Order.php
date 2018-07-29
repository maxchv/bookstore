<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Order".
 *
 * @property int $Id
 * @property int $BookId
 * @property int $OrderDetailsId
 * @property string $PHPSESSID
 * @property string $AddedDate
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['BookId', 'OrderDetailsId'], 'integer'],
            [['OrderDetailsId', 'PHPSESSID'], 'required'],
            [['AddedDate'], 'safe'],
            [['PHPSESSID'], 'string', 'max' => 500],
            [['BookId'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['BookId' => 'Id']],
            [['OrderDetailsId'], 'exist', 'skipOnError' => true, 'targetClass' => Orderdetails::className(), 'targetAttribute' => ['OrderDetailsId' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'BookId' => 'Book ID',
            'OrderDetailsId' => 'Order Details ID',
            'PHPSESSID' => 'Phpsessid',
            'AddedDate' => 'Added Date',
        ];
    }
}
