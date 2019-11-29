<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 28/11/2019
 * Time: 20:44
 */

namespace app\models;


use yii\base\BaseObject;

class ActivityDao extends BaseObject
{

    public static function getById($id)
    {
        return \Yii::$app->db->createCommand('select * from activity where id=:id', [':id' => $id])->queryOne();
    }

    public static function getAllById($id)
    {
        return \Yii::$app->db->createCommand('select * from activity where id>:id', [':id' => $id])->queryAll();
    }



}