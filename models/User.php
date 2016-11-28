<?php

namespace app\models;

use app\behaviors\UserBehavior;

class User extends \dektrium\user\models\User
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications(){
        return $this->hasMany(Notifications::className(),['user_id' => 'id']);
    }
    public function behaviors()
    {
        return [
            UserBehavior::className()
        ];
    }

    public function deleteSeenNotifications(){
         foreach ($this->notifications as $notification) {
            if($notification->seen)
                $notification->delete();
        }
    }
}
