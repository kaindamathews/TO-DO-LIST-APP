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
              <li class="breadcrumb-item text-decoration-none"><a href="<?php echo URLROOT; ?>" class="text-decoration-none">Tasks</a></li>
              <li class="breadcrumb-item active">Edit Task</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


      <div class="row">
    <div class="col-lg-12">

    <?php flash('task_message'); ?>

      <div class="card">
         <div class="card-header">
           Edit Task
         </div>
         <div class="card-body">
          <div class="d-flex justify-content-center">
          <div class="col-lg-8">
          <form action="<?php echo URLROOT; ?>/tasks/edit/<?php echo $data['id']; ?>" method="post">
          <div class="form-group">
              <label>Date:<sup>*</sup></label>
              <input type="date" name="task_date" class="form-control  <?php echo (!empty($data['task_date_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['date']; ?>" >
              <span class="invalid-feedback"><?php echo $data['task_date_err']; ?></span>
          </div> 
             
          <div class="form-group">
              <label>Time:<sup>*</sup></label>
              <input type="time" name="task_time" class="form-control  <?php echo (!empty($data['task_time_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['time']; ?>" >
              <span class="invalid-feedback"><?php echo $data['task_time_err']; ?></span>
          </div> 

          <div class="form-group">
              <label>Category:<sup>*</sup></label>
            <select class="form-control " aria-label="Default select" name='category' >
              <?php if($data['category'] === 'Personal'){ ?>

                <option value="<?php echo $data['category']; ?>" selected><?php echo $data['category']; ?></option>
                <option value="Work">Work</option>

              <?php }else{ ?>

                <option value="<?php echo $data['category']; ?>" selected><?php echo $data['category']; ?></option>
                <option value="Personal">Personal </option>

                <?php }; ?>
             </select>
              <span class="invalid-feedback"><?php echo $data['category_err']; ?></span>
          </div> 


          <div class="form-group">
              <label>Title:<sup>*</sup></label>
              <input type="text" name="title" class="form-control  <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>" placeholder="Add a title...">
              <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
          </div>    
          <div class="form-group">
              <label>Body:<sup>*</sup></label>
              <textarea name="body" class="form-control <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
          </div>
          <input type="submit" class="btn btn-sm btn-warning" value="Submit">
        </form>
             </div>
          </div>

       

         </div>
      </div>


    </div>
</div>


    

      
     </div>
   </section>   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require APPROOT . '/views/inc/footer.php'; ?>
