<?php
namespace tests\codeception\unit\models;
use tests\codeception\unit\behaviors\NewsBehaviorTest;
use yii\db\ActiveRecord;

/**
 * Created by PhpStorm.
 * User: Erbol
 * Date: 01.11.2016
 * Time: 18:23
 */
class NewsTest extends ActiveRecord
{
    public function behaviors()
    {
        return [
          NewsBehaviorTest::className()
        ];
    }
}