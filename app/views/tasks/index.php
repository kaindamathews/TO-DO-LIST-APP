<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tasks</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item "><a href="#" class="text-decoration-none">Home</a></li>
              <li class="breadcrumb-item active">Tasks</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
  <?php flash('task_message'); ?>


  <div class="d-flex justify-content-end mb-3">
    <div class="">
      <a class="btn btn-sm btn-warning pull-right" href="<?php echo URLROOT; ?>/tasks/add"><i class="fa fa-pencil" aria-hidden="true"></i> Add Task</a>
    </div>
  </div>

  
  <?php foreach($data['tasks'] as $task) : ?>
    
    <div class="card card-body mb-3">
      <div class="row">
      <div class="col-lg-10">
         <h4 class="card-title fw-bolder text-capitalize <?php if($task->status == 'Done'){ echo 'text-decoration-line-through'; }; ?>"><?php echo $task->title; ?>(<?php echo $task->category;?>)</h4>
         <p class="card-text"><?php echo $task->body; ?></p>
        
         <div class=" p-2 mb-3">
        <p class="text-dark"> <?php
            $task_date_str = $task->date;
             $task_date = new DateTime($task_date_str);
             $tomorrow = new DateTime('tomorrow');
         if($task_date->format('Y-m-d') === date('Y-m-d')) {
            echo 'Today';
         }elseif ($task_date->format('Y-m-d') === $tomorrow->format('Y-m-d')) {
         echo 'Tomorrow';
         }else{
          echo $task_date->format('F j, Y');
         }
        ?> <span> / </span><?php
        $task_time_str = $task->time;
        $task_time = new DateTime($task_time_str);
        $task_time_formatted = $task_time->format('h:i A');   
        echo $task_time_formatted;        
   ?>
        
 
      
      
      
      </p>
         </div>
         
      </div>

        <div class="col-lg-2">
          <div class="d-flex justify-content-end">
            <div>
        <a class="btn btn-sm btn-danger" href="<?php echo URLROOT; ?>/tasks/delete/<?php echo $task->taskId; ?>"><i class="bi bi-trash"></i></a>
        <a class="btn btn-sm btn-success" href="<?php echo URLROOT; ?>/tasks/done/<?php echo $task->taskId; ?>"><i class="bi bi-check-circle"></i></a>
        <a class="btn btn-sm btn-primary" href="<?php echo URLROOT; ?>/tasks/edit/<?php echo $task->taskId; ?>"><i class="bi bi-pencil-square"></i></a>
            </div>

          </div>
        
        </div>
      </div>
     

    </div>

  <?php endforeach; ?>

    

      
     </div>
   </section>   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require APPROOT . '/views/inc/footer.php'; ?>




  









