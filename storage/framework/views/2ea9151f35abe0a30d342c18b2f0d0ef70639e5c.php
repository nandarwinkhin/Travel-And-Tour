<?php $__env->startSection('title','Create Trip Plan'); ?>
<?php $__env->startSection('content'); ?>

<div class="card card-body bg-light container mt-5 col-md-offset-2 col-md-8">
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-heading">Create A Trip Plan</div>
<div class="panel-body">

<br>

    <!-- <h1>Create Post</h1> -->

  <form method="post"enctype="multipart/form-data">
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <p class="alert alert-danger"><?php echo e($error); ?></p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

  <h3><?php echo e(Auth::user()->name); ?></h3>

  <input type="text" class="form-control" id="trip_title" name="trip_title" placeholder="Trip title">
  <input type="text" class="form-control" id="cost" name="cost" placeholder="Total cost">
  <input type="date" class="form-control" id="trip_start_date" name="trip_start_date" placeholder="When will your trip start?">
  <textarea  class="form-control" id="description" name="description" cols="40" rows="5" placeholder="About the trip"></textarea>


      <?php echo e(csrf_field()); ?>


      <div class="form-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="uploadFile" name="ImageForTrip[]" multiple/> 
            <label class="custom-file-label" for="customFile">Upload image</label>
        </div>
    </div>
    <br/>
    <div id="image_preview"></div>
    
      <button type="submit" class="btn btn-success">Create Trip</button>

  </form>



  

  

</div>
</div>
</div>
</div>
</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>