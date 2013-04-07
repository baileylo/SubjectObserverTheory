<?php

class LoggingService implements SplObserver {
    private $Logger;

    public function __construct(Logger $Logger) {
        $this->Logger = $Logger;
    }

    public function update($object, $event) {
        if ($event == 'database.save') {
            $this->log('Saved instance of ' . get_class($object) . ' to database');
        }
    }
}