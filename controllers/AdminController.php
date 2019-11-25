<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 18/11/2019
 * Time: 20:56
 */
namespace app\controllers;

class AdminController extends \yii\web\Controller
{
    public function actionIndex()
    {
       return $this->render('world');
    }

}