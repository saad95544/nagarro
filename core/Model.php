<?php

class Model {
  protected $db;

  public function __construct() {
    $this->db = new PDO('mysql:host=localhost;dbname=task_manager', 'root', '');
  }
}
