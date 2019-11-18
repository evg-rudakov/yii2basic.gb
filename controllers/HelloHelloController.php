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
       return $this->render('world');
    }

}