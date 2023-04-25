<?php
  class Tasks extends Controller{
    public function __construct(){
      if(!isset($_SESSION['user_id'])){
        redirect('users/login');
      }
      // Load Models
      $this->taskModel = $this->model('Task');
      $this->userModel = $this->model('User');
    }

    // Load All Tasks
    public function index(){
      $userId = $_SESSION['user_id'];
      $tasks = $this->taskModel->getTasks($userId);
      $data = [
        'tasks' => $tasks
      ];
      $this->view('tasks/index', $data);
    }


    // Show Single Task
    public function show($id){
        // Get task from model
        $task = $this->taskModel->getTaskById($id);

        // Check for owner
        if($task->user_id != $_SESSION['user_id']){
          redirect('tasks');
        }

        $data = [
          'id' => $id,
          'title' => $task->title,
          'body' => $task->body,
          'time'=> $task->time,
          'category' => $task->category,
          'date'=> $task->date,
          'status'=> $task->status
        ];

        $this->view('tasks/edit', $data);
    }



    // Add Task 
    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'task_date' => $_POST['task_date'],
          'task_time' => $_POST['task_time'],
          'category' => $_POST['category'],
          'title' => trim($_POST['title']),
          'body' => trim($_POST['body']),
          'user_id' => $_SESSION['user_id'],
        
          'task_date_err' => '',
          'task_time_err' => '',
          'title_err' => '',
          'body_err' => '',
          'category_err'=>''
          
        ];

         // Validate Title 
         if(empty($data['title'])){

          $data['title_err'] = 'Please enter name';
          // Validate body
          if(empty($data['body'])){
            $data['body_err'] = 'Please enter the body';
          }

          if(empty($data['task_date'])){
            $data['task_date_err'] = 'Please enter the date';
          }

          if(empty($data['task_time'])){
            $data['task_time_err'] = 'Please enter the time';
          }

          if(empty($data['category'])){
            $data['category_err'] = 'Please select the Category';
          }
        }

        // Make sure there are no errors
        if(empty($data['title_err']) && empty($data['body_err']) && empty($data['task_date_err']) && empty($data['task_time_err']) && empty($data['category_err']) ){
          // Validation passed
          //Execute
          if($this->taskModel->addTask($data)){
            // Redirect to login
            flash('task_message', 'Task Added');
            redirect('tasks');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('tasks/add', $data);
        }

      } else {
        $data = [
          'title' => '',
          'body' => '',
          'task_date' => '',
          'task_time' => '',
          'category' => ''
        ];
        $this->view('tasks/add', $data);
      }
    }

    // Edit Task
    public function edit($id){

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize Task
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
          'id'=>$id,
          'task_date' => $_POST['task_date'],
          'task_time' => $_POST['task_time'],
          'category' => $_POST['category'],
          'title' => trim($_POST['title']),
          'body' => trim($_POST['body']),
          'status' => $_POST['status'],
          'user_id' => $_SESSION['user_id'],
          'task_date_err' => '',
          'task_time_err' => '',
          'title_err' => '',
          'body_err' => '',
          'category_err'=>''
          
        ];



         // Validate Title 
         if(empty($data['title'])){

          $data['title_err'] = 'Please enter name';
          // Validate body
          if(empty($data['body'])){
            $data['body_err'] = 'Please enter the body';
          }

          if(empty($data['task_date'])){
            $data['task_date_err'] = 'Please enter the date';
          }

          if(empty($data['task_time'])){
            $data['task_time_err'] = 'Please enter the time';
          }

          if(empty($data['category'])){
            $data['category_err'] = 'Please select the Category';
          }
        }


        // Make sure there are no errors
        if(empty($data['title_err']) && empty($data['body_err']) && empty($data['task_date_err']) && empty($data['task_time_err']) && empty($data['category_err']) ){
          // Validation passed
          //Execute
          if($this->taskModel->updateTask($data)){
          // Redirect to login
          flash('task_message', 'Task Updated');
          $this->show($id);
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('tasks/edit', $data);
        }

      } else {
          $this->show($id);
      }
    }


    




   // Done Task
   public function done($id){
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
      //Execute
       $data = [
          'id' => $id,
          'status' => 'Done'    
       ];

      if($this->taskModel->doneTask($data)){
        // Redirect to login
        flash('task_message', 'Task  Done');
        redirect('tasks');
        } else {
          die('Something went wrong');
        }
    } else {
      redirect('tasks');
    }
  }



    // Delete Task
    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'GET'){
        //Execute
      
        if($this->taskModel->deleteTask($id)){
          // Redirect to login
          flash('task_message', 'Task  Removed');
          redirect('tasks');
          } else {
            die('Something went wrong');
          }
      } else {
        redirect('tasks');
      }
    }
  }