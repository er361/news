<?php
/**
 * Created by PhpStorm.
 * User: Erbol
 * Date: 17.10.2016
 * Time: 18:51
 */

namespace app\behaviors;


use app\models\News;
use app\models\Notifications;
use dektrium\user\Mailer;
use dektrium\user\models\User;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class NewsBehavior extends Behavior
{
    private $_users;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $users =  User::find()->asArray()->all();
        $this->setUsers($users);
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->_users;
    }

    /**
     * @param mixed $users
     */
    public function setUsers($users)
    {
        $this->_users = $users;
    }

    /**
     * @return array
     */
    public function attach($owner)
    {
        parent::attach($owner);
         $owner->on(News::EVENT_AFTER_INSERT,[$this,'sendAll']);
         $owner->on(News::EVENT_AFTER_INSERT,[$this,'setNotify']);
    }

    /**
     * @return mixed
     */
    public function setNotify(){
        $hasRows = Notifications::find()->where(['tag'=>'add_news'])->count();
        if(!$hasRows and !\Yii::$app->user->isGuest){
            $notification = new Notifications();
            $notification->message = 'Добавлена новость';
            $notification->tag = 'add_news';
            $notification->seen = 0;
            $notification->user_id = \Yii::$app->user->id;
            $notification->save();
        }
    }
    public function sendAll(){
        $mailer = new Mailer();
        foreach ($this->_users as $user){
            $mailer->sendNotifyMessage($user['email'],$user['username']);
        }
    }
}