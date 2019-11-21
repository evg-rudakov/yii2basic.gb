<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 21/11/2019
 * Time: 20:26
 */
namespace app\modules\admin\controllers;

class DefaultController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}