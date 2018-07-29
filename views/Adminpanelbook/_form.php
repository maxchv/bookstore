<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container book-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'Title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Description')->textarea(['maxlength' => true,'rows' => '6']) ?>

    <?= $form->field($model, 'Author')->textInput(['maxlength' => true]) ?>

    <div class="row" style="margin-bottom: 15px;">
        <div class="col-lg-6">
            <?php
            echo $form->field($model, 'CategoryId')->dropDownList(\yii\helpers\ArrayHelper::map($categories,'Id','Title'),['prompt'=>'Select Category']);
            ?>
        </div>

        <div  class="col-lg-6"><?= $form->field($model, 'Price')->textInput() ?></div>
    </div>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
