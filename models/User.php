<?php

namespace app\models;

class User extends \dektrium\user\models\User
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications(){
        return $this->hasMany(Notifications::className(),['user_id' => 'id']);
    }
}
