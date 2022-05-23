<?php

namespace shop\forms\manage\User;

use shop\entities\User\User;
use yii\base\Model;

class UserEditForm extends Model
{
    public $username;
    public $email;
<<<<<<< HEAD
    public $phone;
    public $role;
=======
>>>>>>> parent of aacbb88 (Added RBAC)

    public $_user;

    public function __construct(User $user, $config = [])
    {
        $this->username = $user->username;
        $this->email = $user->email;
<<<<<<< HEAD
        $this->phone = $user->phone;
        $roles = Yii::$app->authManager->getRolesByUser($user->id);
        $this->role = $roles ? reset($roles)->name : null;
=======
>>>>>>> parent of aacbb88 (Added RBAC)
        $this->_user = $user;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
<<<<<<< HEAD
            [['username', 'email', 'phone', 'role'], 'required'],
=======
            [['username', 'email'], 'required'],
>>>>>>> parent of aacbb88 (Added RBAC)
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['phone', 'integer'],
            [['username', 'email', 'phone'], 'unique', 'targetClass' => User::class, 'filter' => ['<>', 'id', $this->_user->id]],
        ];
    }
}