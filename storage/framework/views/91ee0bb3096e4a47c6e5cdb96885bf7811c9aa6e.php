<?php $__env->startSection('title','Booking List'); ?>

<?php $__env->startSection('content'); ?>
<table border="1" style="margin:20px;">
    <tr>
        <th>Trip</th>
        <th>Customer's name</th>
        <th>Customer's phone number</th>
        <th>Customer's email</th>
        <!-- <th>Accept</th> -->
    </tr>
    <?php $__currentLoopData = $booklist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <?php ($user=App\User::where('id','=',$book->user_id)->get()->first()); ?>
        <?php ($trip=App\TripPlan::where('id','=',$book->trip_id)->get()->first()); ?>

        <?php if($trip!=null): ?>
        <tr>
            <td><?php echo e($trip->trip_title); ?></td>
            <td><?php echo e($user->name); ?></td>
            <td><?php echo e($user->phone); ?></td>
            <td><?php echo e($user->email); ?></td> 
        </tr>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>