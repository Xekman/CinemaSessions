<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\User;

class AddUserController extends Controller
{
    public function actionIndex($username, $password, $email)
    {
        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->setPassword($password);
        $user->generateAuthKey();
        $user->status = User::STATUS_ACTIVE;
        if ($user->save()) {
            echo "User $username has been created.\n";
        } else {
            echo "Failed to create user.\n";
            foreach ($user->errors as $error) {
                echo $error[0] . "\n";
            }
        }
    }
}
