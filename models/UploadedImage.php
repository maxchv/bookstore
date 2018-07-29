<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
* UploadForm is the model behind the upload form.
*/
class UploadedImage extends Model
{
/**
* @var UploadedImage|Null file attribute
*/
    public $Image;

/**
* @return array the validation rules.
*/

    public function rules()
    {
        return [
            [['Image'], 'file'],
            ];
    }


}
?>