<?php

class User {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  // Register user
  public function register($data) {
    $this->db->query('INSERT INTO users (first_name, last_name, email, phone, password) VALUES(:first_name, :last_name, :email, :phone, :password)');
    // Bind values
    $this->db->bind(':first_name', $data['first_name']);
    $this->db->bind(':last_name', $data['last_name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':phone', $data['phone']);
    $this->db->bind(':password', $data['password']);
    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Login user
  public function login($email, $password) {
    $this->db->query('SELECT * FROM users WHERE email = :email');
    $this->db->bind(':email', $email);
    $row = $this->db->single();
    $hashed_password = $row->password;
    if (password_verify($password, $hashed_password)) {
      return $row;
    } else {
      return false;
    }
  }

  // Find user by email
  public function findUserByEmail($email) {
    $this->db->query('SELECT * FROM users WHERE email = :email');
    $this->db->bind(':email', $email);
    $row = $this->db->single();
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
}
