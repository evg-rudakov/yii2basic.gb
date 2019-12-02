<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 02/12/2019
 * Time: 19:48
 */
namespace app\commands;

use app\models\User;

class RbacController extends \yii\console\Controller
{
    /**
     * php yii rbac/init
     * @throws \Exception
     */
    public function actionInit()
    {
        $role = \Yii::$app->authManager->createRole('admin');
        $role->description = 'admin';
        \Yii::$app->authManager->add($role);

        $role = \Yii::$app->authManager->createRole('simple');
        $role->description = 'Просто очень просто пользователь. Проще не может быть';
        \Yii::$app->authManager->add($role);

        $permission = \Yii::$app->authManager->createPermission('getMyActivity');
        \Yii::$app->authManager->add($permission);
    }

    public function actionAddAdmin()
    {
        $user = User::find()->where(['username' => 'admin'])->one();
        if (empty($user)) {
            $user = new User();
            $user->username = 'admin';
            $user->email = 'admin@geekbrains.ru';
            $user->setPassword('admin');
            $user->generateAuthKey();
            if ($user->save()) {
                echo 'good';
            }
        }
        $adminRole = \Yii::$app->authManager->getRole('admin');
        \Yii::$app->authManager->assign($adminRole, $user->id);

    }

}