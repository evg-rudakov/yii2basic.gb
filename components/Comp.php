<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 21/11/2019
 * Time: 20:49
 */
namespace app\components;
use yii\helpers\Html;

class Comp extends \yii\base\Component
{
    public $message;
    public function init()
    {
        $this->message = 'Стандратное зачение';
        parent::init();
    }

    public function show($message)
    {
        $this->message = $message.'qweqweqw';
        return $this->message;
    }
}