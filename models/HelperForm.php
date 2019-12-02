<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 25/11/2019
 * Time: 20:13
 */
namespace app\models;


class HelperForm extends \yii\base\Model
{
    public $phone;
    public $email;
    public $username;
    public $sendEmail;

    public function rules()
    {
        return [
            [['username', 'email', 'phone'], 'required'],
            [['username', 'phone'], 'string'],
            [['email'], 'email'],
            [['sendEmail'], 'boolean']
        ];
    }

    public function attributeLabels()
    {
        return [
            'username'=>'Логин',
            'email'=> 'Электронная почта',
            'phone'=>'Телефон'
        ];
    }
}