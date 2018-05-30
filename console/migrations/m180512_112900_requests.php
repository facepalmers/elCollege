<?php

use yii\db\Migration;

/**
 * Class m180512_112900_requests
 */
class m180512_112900_requests extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180512_112900_requests cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('test', [
            'id' => $this->primaryKey(),
            'name' => $this->string(25)->notNull(),
            'email' => $this->string(50)->notNull(),
            'phone' => $this->integer(12),
            'category' => $this->integer(50)->notNull(),
            'title' => $this->string(50)->notNull(),
            'description' => $this->text()->notNull(),
            'date_create' => $this->timestamp(),
            'date_end' => $this->timestamp(),
            'status_id' => $this->integer(3)->notNull()->defaultValue(1),
        ]);
    }

    public function down()
    {
        $this->dropTable('test');
    }
}
