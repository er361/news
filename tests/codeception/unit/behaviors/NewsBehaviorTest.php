<?php
/**
 * Created by PhpStorm.
 * User: Erbol
 * Date: 17.10.2016
 * Time: 23:27
 */

namespace tests\codeception\unit\behaviors;


use Codeception\Specify;
use dektrium\user\Mailer;
use dektrium\user\models\User;
use GuzzleHttp\Client;
use yii\codeception\TestCase;

class NewsBehaviorTest extends TestCase
{
    use Specify;
    private $_users;

    public function getUsers(){
        $this->_users = User::find()->asArray()->all();
//        codecept_debug($this->_users);
    }

    public function testSendNotifyMessage(){
        $this->specify('should send emails and return true', function (){
            $this->getUsers();
            $mailer = new Mailer();
            foreach ($this->_users as $user){
                $res = $mailer->sendNotifyMessage($user['email'],$user['username']);
                verify($res)->true();
            }
        });
    }

}
