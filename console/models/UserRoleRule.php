<?php
namespace console\models;

use Yii;
use yii\rbac\Rule;
use yii\helpers\ArrayHelper;
use common\models\User;

/*
 * Создаем класс правил.
 * Сравнивается роль текущего пользователя с ролью, которая необходима для получения доступа
 */
class UserRoleRule extends Rule
{
    public $name = 'userRole'; //название данного правила
    /*
     * $user - id текущего пользователя
     * $item - объект роли которую проверяем у текущего пользователя
     * $params - параметры, которые можно передать для проведеня проверки в данный класс
     */
    public function execute($user, $item, $params)
    {
        //Получаем объект текущего пользователя из базы
        $user = ArrayHelper::getValue($params, 'user', User::findOne($user));

        if ($user) {
            $urole = $user->role;

            if ($item->name === 'admin') {
                return $urole == User::ROLE_ADMIN;
            }
            elseif ($item->name === 'moder') {
                return $urole == User::ROLE_ADMIN || $urole == User::ROLE_MODER;
            }
            elseif ($item->name === 'customer') {
                return $urole == User::ROLE_ADMIN || $urole == User::ROLE_MODER || $urole == User::ROLE_CUSTOMER;
            }
            elseif ($item->name === 'user') {
                return $urole == User::ROLE_ADMIN || $urole == User::ROLE_MODER || $urole == User::ROLE_CUSTOMER
                    || $urole == User::ROLE_USER;
            }
        }

        return false;
    }
}

