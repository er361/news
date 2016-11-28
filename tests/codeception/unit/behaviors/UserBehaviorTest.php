<?php
/**
 * Created by PhpStorm.
 * User: Erbol
 * Date: 28.11.2016
 * Time: 19:38
 */
namespace tests\codeception\unit\scripts;

use app\models\User;
use Codeception\Specify;
use dektrium\user\Mailer;
use Symfony\Component\EventDispatcher\Event;
use yii\codeception\TestCase;

class UserBehaviorTest extends TestCase
{
    use Specify;
    public function testChangePassword(){
        $this->specify('will send email if password change', function () {
            $user = User::findOne(2);
            \yii\base\Event::on(User::className(),User::EVENT_BEFORE_UPDATE,[$this,'changePassword']);
            $user->trigger(User::EVENT_BEFORE_UPDATE);
        });
    }

    public function changePassword($event){

        $senderUser = $event->sender;
        $userFromDb = User::findOne($senderUser->id);
//                codecept_debug($userFromDb->username);
        //emulate that user change password
        $senderUser->password_hash = password_hash('new password',PASSWORD_BCRYPT);
        verify($senderUser->password_hash != $userFromDb->password_hash)->true();
    }
    public function testSendEmailChangePassword(){
        $this->specify('send email', function (){
           $mailer = new \app\models\Mailer();
            $mailer->sendChangePasswordNotify('er361@fad.com','er361');
        });
    }
    public function testSendEmailToAdmin(){
        $this->specify('send email to admin after registration', function (){
            $admin = User::findOne(2);
            codecept_debug($admin);
        });
    }
}