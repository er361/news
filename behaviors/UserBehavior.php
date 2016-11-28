<?php
/**
 * Created by PhpStorm.
 * User: Erbol
 * Date: 29.11.2016
 * Time: 0:23
 */

namespace app\behaviors;


use app\models\Mailer;
use app\models\User;
use yii\base\Behavior;

class UserBehavior extends Behavior
{
    public function attach($owner)
    {
        parent::attach($owner);
        $owner->on(User::EVENT_BEFORE_UPDATE,[$this, 'changePassword']);
    }

    public function changePassword($event){
        $senderUser = $event->sender;
        $currentUser = User::findOne($senderUser->id);
        if($senderUser->password_hash != $currentUser->password_hash){
            $this->sendEmail($currentUser);        
        }
    }
    
    public function sendEmail($user){
        $mailer = new Mailer();
        $mailer->sendChangePasswordNotify($user->email,$user->username);
    }
}