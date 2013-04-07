<?php

class User Implements Model {
    static $table = 'users';

    /**
     * Save using Injection rather than Subject Observer
     *
     * @return void
     */
    public function savev2() {
        $this->db_handler->save($this);
        $this->logger->log('Saved instance of User');
        $this->emailer->sendWelcomeEmailer();
    }
}