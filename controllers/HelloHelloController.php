<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 18/11/2019
 * Time: 20:56
 */

namespace app\controllers;

class HelloHelloController extends \yii\web\Controller
{
    public function actionWorldWorld()
    {
        $model = new \app\models\ContactForm();

        if ($model->load(\Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }

        return $this->render('world-world', ['model'=>$model]);
    }
}