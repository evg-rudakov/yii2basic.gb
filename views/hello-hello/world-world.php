<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ContactForm */
/* @var $form ActiveForm */
?>
<div class="hello-hello-world-world">
    <?= Yii::$app->comp->show('надеюсь заработает')?>
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'subject') ?>
        <?= $form->field($model, 'body') ?>
        <?= $form->field($model, 'verifyCode') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- hello-hello-world-world -->
