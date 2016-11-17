<?php

class MainTest extends \yii\codeception\TestCase
{
    use \Codeception\Specify;
    public function testUserViewNotification(){
        $this->specify('should increment seen status', function (){
            $this->login();
            $user = \app\models\User::findOne(Yii::$app->user->id);
            foreach ($user->notifications as $notification) {
                $notification->seen = true;
//                codecept_debug($notification->seen);
                verify($notification->save())->true();
            }
        });
        $this->specify('should delete row where seen status true', function (){
            $this->login();
            $user = \app\models\User::findOne(Yii::$app->user->id);
            foreach ($user->notifications as $notification) {
                if($notification->seen)
                    verify($notification->delete())->notNull();
            }
        });
    }
    public function login(){
        $identity = \app\models\User::findOne(['username' => 'er361']);
        Yii::$app->user->login($identity);
    }
}
