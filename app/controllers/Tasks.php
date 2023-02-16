<?php
class Tasks extends Controller {
    public function __construct() {
        $this->taskModel = $this->model('Task');
    }

    public function create() {
        $data = [
            'title' => '',
            'description' => '',
            'created_by' => '',
            'created_on' => '',
            'status' => ''
        ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'created_by' => trim($_POST['created_by']),
                'created_on' => trim($_POST['created_on']),
                'status' => trim($_POST['status'])
            ];

            if ($this->taskModel->create($data)) {
                //Redirect to the login page
                header('location: ' . URLROOT . '/tasks/get_all_tasks');
            } else {
                die('Something went wrong.');
            }
        }
        $this->view('pages/task_create_update', $data);
    }

    public function update() {
        $data = [
            'title' => '',
            'id' => '',
            'status' => ''
        ];

        //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => trim($_POST['id']),
                'status' => trim($_POST['status'])
            ];
            
            if ($this->taskModel->update($data)) {
                //Redirect to the login page
                header('location: ' . URLROOT . '/pages/tasks');
            } else {
                die('Something went wrong.');
            }
        } else {
            $data = [
                'title' => '',
                'id' => '',
                'status' => ''
            ];
        }
        $this->view('pages/tasks', $data);
    }

    public function get_all_tasks() {
        $data = ['created_by' => $_SESSION['email']];
        $tasks = $this->taskModel->getAllTasks($data);
        $this->view('tasks', $tasks);
    }
}
