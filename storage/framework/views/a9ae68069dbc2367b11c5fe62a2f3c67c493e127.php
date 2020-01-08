<?php $__env->startSection('title','Booking'); ?>

<?php $__env->startSection('content'); ?>

<div class="card card-body bg-light container mt-5 col-md-offset-2 col-md-8">
<form class="form-horizontal" role="form" method="POST">
<?php echo e(csrf_field()); ?>

    <div class="form-row">
        <?php ($user=App\User::where('id','=',$trip->user_id)->get()->first()); ?>
        <img src="http://localhost/TravelAndTour/public/uploades/<?php echo e($user->photo); ?>" width='80' height='80' style='border-radius: 50%;'> 
        <h3 style='margin-top:15px;margin-left:10px;'><?php echo e($user->name); ?></h3>
    </div>
        <small><p style='margin-left: 40px;'><?php echo e($trip->created_at); ?></p></small>
        <ul>
            <li><b>Trip title :</b> <?php echo e($trip->trip_title); ?></li>
            <li><b>cost :</b> <?php echo e($trip->cost); ?></li>
            <li><b>Trip Start Date :</b> <?php echo e($trip->trip_start_date); ?></li>
        </ul>
        <p style='margin: 20px;font-size:20px'><?php echo e($trip->description); ?></p>


        <?php ($filelocations=unserialize($trip->photo)); ?>
        <div class="form-row">
            <?php $__currentLoopData = $filelocations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <img src="http://localhost/TravelAndTour/public/uploades/<?php echo e($location); ?>" width='45%' height='400' style='margin:16px;'>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div>
        <button type="submit" class="btn btn-success">
                                    Book this trip
                                </button>
        </form>
        
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>