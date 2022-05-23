<?php

namespace shop\forms\manage\User;

use shop\entities\User\User;
use yii\base\Model;

class UserCreateForm extends Model
{
    public $username;
    public $email;
    public $phone;
    public $password;

    public function rules(): array
    {
        return [
<<<<<<< HEAD
            [['username', 'email', 'phone', 'role'], 'required'],
=======
            [['username', 'email'], 'required'],
>>>>>>> parent of aacbb88 (Added RBAC)
            ['email', 'email'],
            [['username', 'email'], 'string', 'max' => 255],
            [['username', 'email', 'phone'], 'unique', 'targetClass' => User::class],
            ['password', 'string', 'min' => 6],
            ['phone', 'integer'],
        ];
    }
}