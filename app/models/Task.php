<?php
class Task {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function create($data) {
        session_start();
        $this->db->query('INSERT INTO tasks (title, description, created_by, created_on, status) VALUES(:title, :description, :created_by, :created_on, :status)');

        //Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':created_by', $_SESSION['email']);
        $this->db->bind(':created_on', date('Y/m/d'));
        $this->db->bind(':status', $data['status']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data) {
        $this->db->query('UPDATE tasks SET status = :status WHERE id = :id');

        //Bind value
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':id', $data['id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllTasks($data) {
        $this->db->query('SELECT * FROM tasks');
        $result = $this->db->resultSet();
        return $result;
    }
}
