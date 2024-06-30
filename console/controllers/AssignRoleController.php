<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\User;

class AssignRoleController extends Controller
{
    public function actionIndex($username, $role)
    {
        $auth = Yii::$app->authManager;
        $user = User::findOne(['username' => $username]);

        if (!$user) {
            echo "User not found.\n";
            return;
        }

        $role = $auth->getRole($role);
        if (!$role) {
            echo "Role not found.\n";
            return;
        }

        $auth->assign($role, $user->id);
        echo "Role $role->name has been assigned to user $username.\n";
    }
}
