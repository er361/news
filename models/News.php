<?php

namespace app\models;

use app\behaviors\NewsBehavior;
use app\events\NewsEvent;
use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $head
 * @property string $body
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    public function behaviors()
    {
        return[
            NewsBehavior::className()
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
            [['head'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'head' => 'Head',
            'body' => 'Body',
        ];
    }
}
