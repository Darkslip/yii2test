<?php

namespace console\controllers;

use yii;

use yii\console\Controller;

class RbacController extends Controller
{

    public function actionInit()
    {
        $auth = \Yii::$app->authManager;
        $auth->removeAll();

        $viewper = $auth->createPermission('view');
        $viewper->description = 'View';
        $auth->add($viewper);
		
		$dash = $auth->createPermission('dash');
        $dash->description = 'Dash';
        $auth->add($dash);




        $user = $auth->createRole('user');
        $user->description = 'Пользователь';

        $auth->add($user);

        $user = $auth->createRole('customer');
        $user->description = 'Кастом';

        $auth->add($user);

        $moder = $auth->createRole('moder');
        $moder->description = 'Модератор';

        $auth->add($moder);

        $auth->addChild($moder, $user);


        $admin = $auth->createRole('admin');
        $admin->description = 'Администратор';

        $auth->add($admin);
        $auth->addChild($admin, $viewper);
		
		$auth->assign($admin, 1); 
    }

}
