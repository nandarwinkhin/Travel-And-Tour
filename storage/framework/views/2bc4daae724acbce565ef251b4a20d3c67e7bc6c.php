<?php $__env->startSection('title','Comments'); ?>

<?php $__env->startSection('content'); ?>

<div class="card card-body bg-light container mt-5 col-md-offset-2 col-md-8">
<form class="form-horizontal" role="form" method="POST">
<?php echo e(csrf_field()); ?>

<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <p class="alert alert-danger"><?php echo e($error); ?></p>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<div class="form-row">
    <div class="col-md-8">
        <input id="description" type="text" class="form-control" name="description" placeholder="Comment" required>
    </div>
    <button type="submit" class="btn btn-success">
        Send
    </button>
</div>
</form>
</div>



        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="card card-body bg-light container mt-5 col-md-offset-2 col-md-8">
            <?php ($user=App\User::where('id','=',$comment->user_id)->get()->first()); ?>
            <div class="form-row">
                <img src="http://localhost/TravelAndTour/public/uploades/<?php echo e($user->photo); ?>" width='80' height='80' style='border-radius: 50%;'> 
                <h3 style='margin-top:15px;margin-left:10px;'><?php echo e($user->name); ?></h3>
            </div>
            <small><p style='margin-left: 80px;'><?php echo e($comment->created_at); ?></p></small>
            <p style='margin: 20px;font-size:20px'><?php echo e($comment->description); ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>