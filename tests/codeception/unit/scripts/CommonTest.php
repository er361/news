<?php
/**
 * Created by PhpStorm.
 * User: Erbol
 * Date: 01.11.2016
 * Time: 19:08
 */
namespace tests\codeception\unit\scripts;


use app\models\Notifications;
use Codeception\Specify;
use app\models\User;
use yii\codeception\TestCase;
use yii\web\Session;

class Common extends TestCase
{
    use Specify;

    public function testLoginUser(){
        $this->specify('that user has login', function (){
            $identity = User::findOne(['username' => 'er361']);
            $user = \Yii::$app->user;
            verify($user->login($identity))->true();
//            codecept_debug(\Yii::$app->user->id);
        });
    }

//    public function testAddNotification()
//    {
//        $this->specify('add new news row if not exists', function () {
//            $hasRows = Notifications::find()->where(['tag' => 'add_news'])->all();
//            if (!$hasRows) {
//                $notification = new Notifications();
//                $notification->message = 'Добавлена новость';
//                $notification->seen = 0;
//                $notification->tag = 'add_news';
//                $notification->user_id = User::findOne(['username' => 'er361'])->id;
////                codecept_debug($notification->user_id);
//                verify($notification->save())->true();
//            }
//        });
//    }

    public function testHasMessages()
    {
        $this->specify('see that user has notifications', function () {
            $user = User::findOne(['username' => 'er361']);
            $notifications = $user->notifications;
            verify($notifications)->notEmpty();
            foreach ($notifications as $item) {
                codecept_debug($item->message);
            }
        });
        $this->clearTable();
    }

    public function clearTable()
    {
        $this->specify('show clear table', function () {
            verify(Notifications::deleteAll())->notNull();
        });
    }
}