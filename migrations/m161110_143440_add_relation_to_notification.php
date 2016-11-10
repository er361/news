<?php

use yii\db\Migration;

class m161110_143440_add_relation_to_notification extends Migration
{
    public function up()
    {
        $this->addColumn('notifications','user_id',$this->integer());
        $this->addForeignKey('fk_user_id','notifications','user_id','user','id');
    }

    public function down()
    {
        $this->dropColumn('notifications','user_id');
        $this->dropForeignKey('fk_user_id','notifications');
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
