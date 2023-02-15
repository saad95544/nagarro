<?php

class TaskController extends Controller {
  public function index() {
    $user_id = $_SESSION['user_id'];
    $tasks = $this->model('Task')->getUserTasks($user_id);
    $this->view('task/index', ['tasks' => $tasks]);
  }

  public function create() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $title = $_POST['title'];
      $description = $_POST['description'];
      $completed_by = $_SESSION['user_id'];

      $task_id = $this->model('Task')->createTask($title, $description, $completed_by);

      if ($task_id) {
        header('Location: /task/index');
        exit;
      } else {
        $this->view('task/create', ['error' => 'An error occurred while creating the task. Please try again.']);
      }
    } else {
      $this->view('task/create');
    }
  }

  public function edit($id) {
    $task = $this->model('Task')->getTaskById($id);

    if (!$task) {
      header('Location: /task/index');
      exit;
    }

    if ($task['completed_by'] != $_SESSION['user_id']) {
      header('Location: /task/index');
      exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $status = $_POST['status'];

      $result = $this->model('Task')->updateTaskStatus($id, $status);

      if ($result) {
        header('Location: /task/index');
        exit;
      } else {
        $this->view('task/edit', ['error' => 'An error occurred while updating the task. Please try again.']);
      }
    } else {
      $this->view('task/edit', ['task' => $task]);
    }
  }
}
