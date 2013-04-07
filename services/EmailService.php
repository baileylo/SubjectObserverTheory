<?php

class EmailService implements SplObserver {
    private $mailer;

    public function __construct(Mailer $mailer) {
        $this->mailer = $mailer;
    }

    public function update($object, $event) {
        if ($event == 'database.save' && $object instanceof User) {
            $this->sendConfirmationEmail($object)
        }
    }

    private function sendConfirmationEmail(User $user) {
        // send welcome email to user.
    }
}