<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 09/12/2019
 * Time: 19:33
 */

namespace app\commands;


use app\models\Activity;
use yii\console\Controller;

class MailController extends Controller
{
    public $message;
    public $text;

    public function actionIndex($arg, $arg2)
    {
        echo $arg . PHP_EOL;
        echo $arg2 . PHP_EOL;
        echo $this->message . PHP_EOL;
        echo $this->text . PHP_EOL;
    }

    public function options($actionID)
    {
        return ['message', 'text'];
    }

    public function optionAliases()
    {
        return ['m' => 'message', 't' => 'text'];
    }

    public function actionSendOut($email= null)
    {
        $activitiesQuery = Activity::find();
        if (!is_null($email)) {
            $activitiesQuery->joinWith('users')->where(['user.email' => $email]);
        }
        foreach ($activitiesQuery->each(100) as $activity) {
            foreach ($activity->users as $user) {
                $mailSend = \Yii::$app->mailer
                    ->compose('activity/notification-html', ['activity' => $activity])
                    ->setFrom('noreply@yii2basig.gb')
                    ->setSubject('Первое письмо')
                    ->setTo($user->email)->setCharset('UTF-8')
                    ->send();

                if ($mailSend === true) {
                    echo "message to $user->email было отправленно success {$activity->title}" . PHP_EOL;
                }
            }
        }


    }

}