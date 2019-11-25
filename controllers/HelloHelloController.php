<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 18/11/2019
 * Time: 20:56
 */

namespace app\controllers;

use app\models\HelperForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\VarDumper;

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

    public function actionHelpers()
    {
        return $this->render('helpers');
    }

    public function actionForms()
    {
        $model = new HelperForm();

        if (\Yii::$app->request->isPost) {
            if ($model->load(\Yii::$app->request->post())) {
                if ($model->validate()) {
                    return $this->redirect(Url::to('hello-hello/success-page'));
                }
            }
        }

        return $this->render('forms', ['model' => $model]);

    }

    public function actionSuccessPage()
    {
        $this->render('success');
    }
}