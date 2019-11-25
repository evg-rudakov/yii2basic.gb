<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 25/11/2019
 * Time: 20:18
 */
/** @var \app\models\HelperForm $model */

use yii\helpers\Html;
use yii\widgets\ActiveForm;


$form = ActiveForm::begin([
    'enableClientValidation' => false,
    'method' => 'post',
]);
echo $form->field($model, 'username')->textInput()->label(false);
echo $form->field($model, 'email')->textInput()->label('Особенный емайл');
echo $form->field($model, 'phone')->textarea();
echo $form->field($model, 'sendEmail')->checkbox();

echo Html::submitButton('Отправить',
    ['class'=>'btn btn-success']);
ActiveForm::end();


?>

<form method="POST" action="/hello-hello/hello-form">
    <input type="text">
    <input type="submit" value="Отправить">
</form>
