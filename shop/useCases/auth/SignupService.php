<?php

namespace shop\useCases\auth;

<<<<<<< HEAD:shop/useCases/auth/SignupService.php
use shop\access\Rbac;
use shop\dispatchers\EventDispatcher;
use shop\entities\User\User;
use shop\forms\auth\SignupForm;
use shop\repositories\UserRepository;
use shop\services\RoleManager;
use shop\services\TransactionManager;
=======
use shop\entities\User\User;
use shop\forms\auth\SignupForm;
use shop\repositories\UserRepository;
use yii\mail\MailerInterface;
>>>>>>> parent of aacbb88 (Added RBAC):shop/services/auth/SignupService.php

class SignupService
{
    private $users;

<<<<<<< HEAD:shop/useCases/auth/SignupService.php
    public function __construct(
        UserRepository $users,
        RoleManager $roles,
        TransactionManager $transaction
    )
=======
    public function __construct(UserRepository $users, MailerInterface $mailer)
>>>>>>> parent of aacbb88 (Added RBAC):shop/services/auth/SignupService.php
    {
        $this->users = $users;
    }

    public function signup(SignupForm $form): void
    {
        $user = User::requestSignup(
            $form->username,
            $form->email,
            $form->phone,
            $form->password
        );
<<<<<<< HEAD:shop/useCases/auth/SignupService.php
        $this->transaction->wrap(function () use ($user) {
            $this->users->save($user);
            $this->roles->assign($user->id, Rbac::ROLE_USER);
        });
=======
        $this->users->save($user);

        $sent = $this->mailer
            ->compose(
                ['html' => 'auth/signup/confirm-html', 'text' => 'auth/signup/confirm-text'],
                ['user' => $user]
            )
            ->setTo($form->email)
            ->setSubject('Signup confirm for ' . \Yii::$app->name)
            ->send();
        if (!$sent) {
            throw new \RuntimeException('Email sending error.');
        }
>>>>>>> parent of aacbb88 (Added RBAC):shop/services/auth/SignupService.php
    }

    public function confirm($token): void
    {
        if (empty($token)) {
            throw new \DomainException('Empty confirm token.');
        }
        $user = $this->users->getByEmailConfirmToken($token);
        $user->confirmSignup();
        $this->users->save($user);
    }
}