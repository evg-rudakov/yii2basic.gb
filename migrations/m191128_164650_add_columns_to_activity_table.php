<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%activity}}`.
 */
class m191128_164650_add_columns_to_activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%activity}}', 'title', $this->string());
        $this->addColumn('{{%activity}}', 'started_at', $this->bigInteger());
        $this->addColumn('{{%activity}}', 'finished_at', $this->bigInteger());
        $this->addColumn('{{%activity}}', 'user_id', $this->integer());
        $this->addColumn('{{%activity}}', 'main', $this->boolean());
        $this->addColumn('{{%activity}}', 'cycle', $this->boolean());
        $this->addColumn('{{%activity}}', 'created_at', $this->bigInteger());
        $this->addColumn('{{%activity}}', 'updated_at', $this->bigInteger());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%activity}}', 'title');
        $this->dropColumn('{{%activity}}', 'started_at');
        $this->dropColumn('{{%activity}}', 'finished_at');
        $this->dropColumn('{{%activity}}', 'user_id');
        $this->dropColumn('{{%activity}}', 'main');
        $this->dropColumn('{{%activity}}', 'cycle');
        $this->dropColumn('{{%activity}}', 'created_at');
        $this->dropColumn('{{%activity}}', 'updated_at');
    }
}
