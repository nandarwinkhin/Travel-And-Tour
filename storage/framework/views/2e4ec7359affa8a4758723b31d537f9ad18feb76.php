<?php $__env->startSection('title','Register'); ?>

<?php $__env->startSection('content'); ?>
<div class="card card-body bg-light container mt-5 col-md-offset-2 col-md-8">
<form method="post" enctype="multipart/form-data">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <p class="alert alert-danger"><?php echo e($error); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                 <?php if(session('status')): ?>
                    <p class="alert alert-success"><?php echo e(session('status')); ?></p>
                 <?php endif; ?>
                    
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group" style="width: 500x; height: 200px; ">
                            <div class="custom-file">
                            <label for="name" class="col-md-4 control-label">Profile picture</label>
                                <div style="background-color: lightgrey;width:150px; height:150px;">
                                    <div id="image_preview"></div>
                                    <input type="file" class="custom-file-input" id="uploadFile" name="ImageForUser" style="width: 150px; height: 150px; "/> 
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="inputState" type="text" class="form-control" name="name" required autofocus>

                                <!-- <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?> -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="inputState" type="text" class="form-control" name="phone" required autofocus>

                                <!-- <?php if($errors->has('phone')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('phone')); ?></strong>
                                    </span>
                                <?php endif; ?> -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="inputState" type="email" class="form-control" name="email"required>

                                <!-- <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?> -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gender" class="col-md-4 control-label">Gender</label>
                            <div class="radio" id="inputState">
                                <label><input type="radio" name="gender" value="Male">Male</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="gender" value="Female">Female</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="inputState" type="password" class="form-control" name="password" required>

                                <!-- <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?> -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="inputState" type="password" class="form-control" name="password_confirm" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>