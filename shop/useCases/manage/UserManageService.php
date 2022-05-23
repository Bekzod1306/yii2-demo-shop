<?php

namespace shop\useCases\manage;

use shop\entities\User\User;
use shop\forms\manage\User\UserCreateForm;
use shop\forms\manage\User\UserEditForm;
use shop\repositories\UserRepository;
<<<<<<< HEAD:shop/useCases/manage/UserManageService.php
use shop\services\newsletter\Newsletter;
use shop\services\RoleManager;
use shop\services\TransactionManager;
=======
>>>>>>> parent of aacbb88 (Added RBAC):shop/services/manage/UserManageService.php

class UserManageService
{
    private $repository;
<<<<<<< HEAD:shop/useCases/manage/UserManageService.php
    private $roles;
    private $transaction;
    /**
     * @var Newsletter
     */
    private $newsletter;

    public function __construct(
        UserRepository $repository,
        RoleManager $roles,
        TransactionManager $transaction,
        Newsletter $newsletter
    )
    {
        $this->repository = $repository;
        $this->roles = $roles;
        $this->transaction = $transaction;
        $this->newsletter = $newsletter;
=======

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
>>>>>>> parent of aacbb88 (Added RBAC):shop/services/manage/UserManageService.php
    }

    public function create(UserCreateForm $form): User
    {
        $user = User::create(
            $form->username,
            $form->email,
            $form->phone,
            $form->password
        );
<<<<<<< HEAD:shop/useCases/manage/UserManageService.php
        $this->transaction->wrap(function () use ($user, $form) {
            $this->repository->save($user);
            $this->roles->assign($user->id, $form->role);
            $this->newsletter->subscribe($user->email);
        });
=======
        $this->repository->save($user);
>>>>>>> parent of aacbb88 (Added RBAC):shop/services/manage/UserManageService.php
        return $user;
    }

    public function edit($id, UserEditForm $form): void
    {
        $user = $this->repository->get($id);
        $user->edit(
            $form->username,
            $form->email,
            $form->phone
        );
        $this->repository->save($user);
    }

    public function assignRole($id, $role): void
    {
        $user = $this->repository->get($id);
        $this->roles->assign($user->id, $role);
    }

    public function remove($id): void
    {
        $user = $this->repository->get($id);
        $this->repository->remove($user);
        $this->newsletter->unsubscribe($user->email);
    }
}