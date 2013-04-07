<?php

class DBObjectService implements SplObserver {
    private $db_handler;

    public function __construct(PDO $db_handler) {
        $this->db_handler = $db_handler;
    }

    public function update($object, $event) {
        if ($event == 'database.save') {
            $this->save($object);
        }
    }

    private function save(Model $object) {
        /* stuffs to save */
    }
}