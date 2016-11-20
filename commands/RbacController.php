<?php
/**
 * Created by PhpStorm.
 * User: Erbol
 * Date: 19.11.2016
 * Time: 14:57
 */

namespace app\commands;


use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit(){
        $auth = Yii::$app->authManager;
        $moderator = $auth->createRole('moderator');
        $auth->add($moderator);
        $auth->assign($moderator,2);
//        $auth->removeAllRoles();
    }
}