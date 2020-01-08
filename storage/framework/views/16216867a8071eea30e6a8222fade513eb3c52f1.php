<?php $__env->startSection('title','Home'); ?>
<?php $__env->startSection('content'); ?>

    <?php $__currentLoopData = $trips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trip): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <div class="card card-body bg-light container mt-5 col-md-offset-2 col-md-8">
    
        <?php ($user=App\User::where('id','=',$trip->user_id)->get()->first()); ?>
        <a href="<?php echo e(url('/userProfile/' . $user->id)); ?>" style="text-decoration:none; color:#333"><div class="form-row"><img src="http://localhost/TravelAndTour/public/uploades/<?php echo e($user->photo); ?>" width='80' height='80' style='border-radius: 50%;'> 
        <h3 style='margin-top:15px;margin-left:10px;'><?php echo e($user->name); ?></h3></div></a>
    
        <small><p style='margin-left: 80px;'><?php echo e($trip->created_at); ?></p></small>
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
        <?php if(Auth::Check()): ?>
        <div class="form-row">
        
            <a href="<?php echo e(url('/booking/' . $trip->id . '/trip')); ?>" class="btn btn-success" style="margin:8px;">Book this trip</a>
            <a href="<?php echo e(url('/comments/' . $trip->id . '/2')); ?>" class="btn btn-success" style="margin:8px;">Comment</a>
        </div>
        <?php endif; ?>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <div class="card card-body bg-light container mt-5 col-md-offset-2 col-md-8">
    
        <?php ($user=App\User::where('id','=',$post->user_id)->get()->first()); ?>
        <a href="<?php echo e(url('/userProfile/' . $user->id)); ?>" style="text-decoration:none; color:#333"><div class="form-row"><img src="http://localhost/TravelAndTour/public/uploades/<?php echo e($user->photo); ?>" width='80' height='80' style='border-radius: 50%;'> 
        <h3 style='margin-top:15px;margin-left:10px;'><?php echo e($user->name); ?></h3>
    </div></a>
        <small><p style='margin-left: 80px;'><?php echo e($post->created_at); ?></p></small>
        <p style='margin: 20px;font-size:20px'><?php echo e($post->description); ?></p>


        <?php ($filelocations=unserialize($post->photo)); ?>
        <div class="form-row">
            <?php $__currentLoopData = $filelocations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <img src="http://localhost/TravelAndTour/public/uploades/<?php echo e($location); ?>" width='45%' height='400' style='margin:16px;'>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div>
        <?php if(Auth::Check()): ?>
        <div class="form-row">
            
            <a href="<?php echo e(url('/comments/' . $post->id . '/1')); ?>" class="btn btn-success" style="margin:8px;">Comment</a>
        </div>
        <?php endif; ?>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>