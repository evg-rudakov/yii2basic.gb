<?php

/**
 * Created by PhpStorm.
 * User: evg
 * Date: 21/11/2019
 * Time: 20:57
 */
class Activity extends \yii\base\Model
{

    public $cycle;
    public $main;

    public static function getObject($id)
    {
        return \app\models\ActivityDao::getById($id);
    }
}
