<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 09/12/2019
 * Time: 20:36
 */

namespace app\components\behaviors;


use yii\base\Behavior;
use yii\db\ActiveRecord;

class CacheBehavior extends Behavior
{

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'deleteCache',
            ActiveRecord::EVENT_AFTER_UPDATE => 'deleteCache',
            ActiveRecord::EVENT_AFTER_DELETE => 'deleteCache',
        ];
    }

    public function deleteCache()
    {
        \Yii::$app->cache->delete(get_class($this->owner) . "_" . $this->owner->getPrimaryKey());
        //реализовать стирание кеша для calenarSearch()
    }
}