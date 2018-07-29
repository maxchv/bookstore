<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Book".
 *
 * @property int $Id
 * @property string $Title
 * @property string $Description
 * @property string $Author
 * @property string $AddedDate
 * @property int $CategoryId
 * @property string $Image
 * @property int $Price
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Title', 'Author', 'Price'], 'required'],
            [['AddedDate'], 'safe'],
            [['CategoryId', 'Price'], 'integer'],
            [['Title', 'Author'], 'string', 'max' => 200],
            [['Description'], 'string', 'max' => 1500],
            [['Image'], 'string', 'max' => 3000],
            [['CategoryId'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['CategoryId' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Title' => 'Title',
            'Description' => 'Description',
            'Author' => 'Author',
            'AddedDate' => 'Added Date',
            'CategoryId' => 'Category ID',
            'Image' => 'Image',
            'Price' => 'Price',
        ];
    }
}
