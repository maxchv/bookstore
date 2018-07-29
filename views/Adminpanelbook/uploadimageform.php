<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 7/28/2018
 * Time: 6:37 PM
 */?>
<div class="container">

    <?php $form = \yii\widgets\ActiveForm::begin(); ?>

    <?= $form->field($model, 'Image')->fileInput() ?>

    <div class="form-group">
        <?= \yii\helpers\Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php \yii\widgets\ActiveForm::end(); ?>
</div>