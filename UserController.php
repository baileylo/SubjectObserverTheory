<?php

class UserSubjectController {
    $container;

    public function __construct(Pimple $container) {
        $this->container = $container;
    }

    public function register() {
        $email = $this->post->email;
        $password = $this->post->password;

        $user = new User();
        $user->attach(new DBObjectService($this->container['mysql']));
        $user->attach(new LoggingService($this->container['logger']));
        $user->attach(new EmailService($this->container['mailer']));
        $user->email = $email;
        $user->password = $container->get('Hash')->encrypt($password);
        $user->save();
    }

    public function register() {
        $email = $this->post->email;
        $password = $this->post->password;

        $user = new User();
        $user->setLogger($this->container['logger']);
        $user->setDBHandler($this->container['mysql']);
        $user->setEmailer($this->container['mailer']);
        $user->email = $email;
        $user->password = $container->get('Hash')->encrypt($password);
        $user->savev2();
    }
}