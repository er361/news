<?php

/* @var $this yii\web\View */

$this->title = 'Главная';
?>
<?php
$dataProvider = new \yii\data\ActiveDataProvider([
   'query' => \app\models\News::find(),
    'pagination' => [
        'pageSize' => 3,
    ]
]);

echo  \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_news',
]);
