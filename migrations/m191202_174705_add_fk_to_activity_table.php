<?php

use yii\db\Migration;

/**
 * Class m191202_174705_add_fk_to_activity_table
 */
class m191202_174705_add_fk_to_activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk-user_id-activity', 'activity', 'user_id', 'user', 'id');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-user_id-activity', 'activity');
    }

}
