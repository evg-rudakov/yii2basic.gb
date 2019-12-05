<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 18/11/2019
 * Time: 20:56
 */

namespace app\controllers;

use app\models\ActivityDao;
use app\models\HelperForm;
use yii\db\Exception;
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

    public function actionFillDb()
    {
        \Yii::beginProfile("title", 'testing');

        for ($i = 0; $i < 10; $i++) {
            try {
                \Yii::beginProfile("title  $i 1", 'testing');
                \Yii::$app->db->beginTransaction();
                $query = \Yii::$app->db->createCommand()->insert('activity', [
                    //тут два пробела    \/
                    'title' => "title  $i",
                    'created_at' => time(),
                    'started_at' => time() + $i * 60 * 60 * 24,
                    'finished_at' => time() + ($i + 1) * 60 * 60 * 24,
                    'cycle' => false,
                    'main' => false,
                    'user_id' => $i,

                ]);
                \Yii::endProfile("title  $i 1", 'testing');
                \Yii::beginProfile("title  $i 2", 'testing');


                echo $query->getRawSql() . "<br>";
                $query->execute();



                if ($i>5) {
                    throw new Exception('test');
                }
                \Yii::beginProfile("title  $i 2", 'testing');

                \Yii::$app->db->transaction->commit();
            } catch (\Throwable $exception) {
                var_dump($exception->getMessage());
                \Yii::$app->db->transaction->rollBack();
            }

        }
        \Yii::endProfile("title", 'testing');
        return $this->render('world');
    }

    public function actionQuery($id, $title=null)
    {
        $query = \Yii::$app->db
            ->createCommand('SELECT id, title from activity where id=:id',
                [
                    ':id' => $id
                ]);

        echo $query->getRawSql()."<br>";

        $result = $query->queryAll();

        var_dump($result);
        die();
    }


    public function actionUpdate($id)
    {
        $query = \Yii::$app->db->createCommand()->update('activity',
            ['id' => $id, 'title' => 'updated', 'updated_at' => time()],
            "id=:id", [':id' => $id]

        );
//             * $connection->createCommand()->update('user', ['status' => 1], 'age > :minAge', [':minAge' => $minAge])->execute();

        echo $query->getRawSql()."<br>";

        $query->execute();

    }

    public function actionDao($id)
    {
        $activity = ActivityDao::getById($id);
        var_dump($activity);
        die();
    }


}