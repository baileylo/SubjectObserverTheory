<?php

class Model implements SplSubject {
  private $attributes;
  private $values;

  static $table = null;
  protected $_observers = [];

  /**
   * Insert item into database.
   */
  public function save() {
    $this->notify('database.save');
  }

  /**
   * Delete item from database.
   *
   */
  public function delete() {
    $this->notify('database.delete');
  }

  public function attach(SplObserver $observer) {
    $id = spl_object_hash($observer);
    $this->_observers[$id] = $observer;
  }

  public function detach(SplObserver $observer) {
    $id = spl_object_hash($observer);

    if (isset($this->_observers[$id])) {
      unset($this->_observers[$id]);
    }
  }

  public function notify($eventData = null) {
    foreach ( $this->_observers as $observer ) {
      $observer->update($this, $eventData);
    }
  }
}