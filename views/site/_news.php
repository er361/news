<?php
/**
 * Created by PhpStorm.
 * User: Erbol
 * Date: 14.10.2016
 * Time: 0:38
 */
?>
<div>
    <?php if(!Yii::$app->user->isGuest): ?>
        <h2><?php echo \yii\bootstrap\Html::encode($model->head)?></h2>
        <?php echo \yii\bootstrap\Html::encode($model->body) ?>
    <?php else: ?>
        <h2><?php echo \yii\bootstrap\Html::encode($model->head)?></h2>
        <?php echo \yii\helpers\StringHelper::truncateWords($model->body,30, '...')  ?>
    <?php endif;?>
</div>
