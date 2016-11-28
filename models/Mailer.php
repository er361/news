<?php
/**
 * Created by PhpStorm.
 * User: Erbol
 * Date: 29.11.2016
 * Time: 0:04
 */

namespace app\models;


class Mailer extends \dektrium\user\Mailer
{
    /**
     * @param $to
     * @param $subject
     */
    public function sendChangePasswordNotify($to, $subject){
        $this->sendMessage($to,$subject,'changePasswordNotify');
    }
}