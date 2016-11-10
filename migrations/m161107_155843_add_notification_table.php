<?php

use yii\db\Migration;

class m161107_155843_add_notification_table extends Migration
{
    public function up()
    {
        $this->createTable('notifications', [
            'id' => $this->primaryKey(),
            'message' => $this->string()->notNull(),
            'seen' => $this->boolean()
        ]);
    }

    public function down()
    {
        $this->dropTable('notification');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
