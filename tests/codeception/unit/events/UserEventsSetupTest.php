<?php

use app\models\News;
use Codeception\Specify;
use yii\base\Event;

class UserEventsSetupTest extends \yii\codeception\TestCase
{
    use Specify;
    public function testUserNewsEvents(){
        $this->specify('pub sub news events', function (){
            Event::on(News::className(), News::EVENT_AFTER_INSERT,function ($event){
                codecept_debug('event fired up');
            });
            Event::trigger(News::className(), News::EVENT_AFTER_INSERT);
//            Event::off(News::className(), News::EVENT_AFTER_INSERT);
//            Event::trigger(News::className(), News::EVENT_AFTER_INSERT);
        });
    }
}
