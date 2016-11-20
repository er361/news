<?php

use yii\db\Migration;

class m161120_171634_add_recive_notifications_to_profile extends Migration
{
    public function up()
    {
        $this->addColumn('profile','get_notification',$this->string());
    }

    public function down()
    {
        $this->dropColumn('profile','get_notification');
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
