<?php

class AuthController extends Controller {
  public function login() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $user = $this->model('User')->getUserByEmail($email);

      if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: /task/index');
        exit;
      } else {
        $this->view('auth/login', ['error' => 'Invalid email or password']);
      }
    } else {
      $this->view('auth/login');
    }
  }

  public function register() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

      $user_id = $this->model('User')->createUser($first_name, $last_name, $email, $phone, $password);

      if ($user_id) {
        $_SESSION['user_id'] = $user_id;
        header('Location: /task/index');
        exit;
      } else {
        $this->view('auth/register', ['error' => 'An error occurred while registering. Please try again.']);
      }
    } else {
      $this->view('auth/register');
    }
  }

  public function logout() {
    session_unset();
    session_destroy();
    header('Location: /auth/login');
    exit;
  }
}
