<?php

class Task {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getUserTasks($user_id) {
    $this->db->query('SELECT * FROM tasks WHERE completed_by = :user_id');
    $this->db->bind(':user_id', $user_id);

    $results = $this->db->resultSet();

    return $results;
  }

  public function createTask($title, $description, $completed_by) {
    $this->db->query('INSERT INTO tasks (title, description, completed_by) VALUES (:title, :description, :completed_by)');
    $this->db->bind(':title', $title);
    $this->db->bind(':description', $description);
    $this->db->bind(':completed_by', $completed_by);

    if ($this->db->execute()) {
      return $this->db->lastInsertId();
    } else {
      return false;
    }
  }

  public function getTaskById($id) {
    $this->db->query('SELECT * FROM tasks WHERE id = :id');
    $this->db->bind(':id', $id);

    $result = $this->db->single();

    return $result;
  }

  public function updateTaskStatus($id, $status) {
    $this->db->query('UPDATE tasks SET status = :status, completed_on = NOW() WHERE id = :id');
    $this->db->bind(':status', $status);
    $this->db->bind(':id', $id);

    return $this->db->execute();
  }
}
