<?php
  class Task {
    private $db;
    
    public function __construct(){
      $this->db = new Database;
    }

    // Get All Tasks
    public function getTasks($userId){
      $this->db->query("SELECT *, 
                        tasks.id as taskId, 
                        users.id as userId
                        FROM tasks 
                        INNER JOIN users 
                        ON tasks.user_id = users.id 
                        where tasks.user_id = $userId
                        ORDER BY tasks.created_at DESC;");

      $results = $this->db->resultset();

      return $results;
    }

    // Get Task By ID
    public function getTaskById($id){
      $this->db->query("SELECT * FROM tasks WHERE id = :id");

      $this->db->bind(':id', $id);
      
      $row = $this->db->single();

      return $row;
    }

    // Add Task
    public function addTask($data){
      // Prepare Query
      $this->db->query('INSERT INTO tasks (title, user_id, body ,date ,time,category ) 
      VALUES (:title, :user_id, :body,:task_date, :task_time,:category)');

      // Bind Values
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':body', $data['body']);
      $this->db->bind(':task_date', $data['task_date']);
      $this->db->bind(':task_time', $data['task_time']);
      $this->db->bind(':category', $data['category']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Update Task
    public function updateTask($data){
      // Prepare Query
      $this->db->query('UPDATE tasks SET title = :title, body = :body ,date = :task_date, time = :task_time, category = :category WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);
      $this->db->bind(':task_date', $data['task_date']);
      $this->db->bind(':task_time', $data['task_time']);
      $this->db->bind(':category', $data['category']); 
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function doneTask($data){
      // Prepare Query
      $this->db->query('UPDATE tasks SET status = :status WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':status', $data['status']);
    
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Delete Task
    public function deleteTask($id){
      // Prepare Query
      $this->db->query('DELETE FROM tasks WHERE id = :id');
      // Bind Values
      $this->db->bind(':id', $id);
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }