<?php

use yii\db\Migration;

class m161110_134813_add_notification_tag_column extends Migration
{
    public function up()
    {
        $this->addColumn('notifications','tag',$this->string());
    }

    public function down()
    {
        $this->dropColumn('notifications','tag');
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
