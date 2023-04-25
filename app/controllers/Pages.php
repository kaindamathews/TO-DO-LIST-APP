<?php
  class Pages extends Controller{
    public function __construct(){
     
    }
    // Load Homepage
    public function index(){
      // If logged in, redirect to Tasks
      if(isset($_SESSION['user_id'])){
        redirect('tasks');
      }
         // Init data
         $data = [
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',
        ];
      // Load homepage/index view
      $this->view('users/login',$data);
    }

  
  }