<?php $__env->startSection('title','Profile'); ?>

<?php $__env->startSection('content'); ?>
<form method="post" enctype="multipart/form-data">
<div class="card card-body bg-light container mt-5 col-md-offset-2 col-md-8">
    <?php if(Auth::user()->type_id==1): ?>
    


                <div class="panel-body">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <p class="alert alert-danger"><?php echo e($error); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                 <?php if(session('status')): ?>
                    <p class="alert alert-success"><?php echo e(session('status')); ?></p>
                 <?php endif; ?>
                    
                        <?php echo e(csrf_field()); ?>

                        
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="inputState" type="text" class="form-control" name="name" value="<?php echo e(Auth::user()->name); ?>" required>

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
                                <input id="inputState" type="text" class="form-control" name="phone" value="<?php echo e(Auth::user()->phone); ?>" required >

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
                                <input id="inputState" type="email" class="form-control" name="email" value="<?php echo e(Auth::user()->email); ?>"required>

                                <!-- <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?> -->
                            </div>
                        </div>

                    
</div>
    <?php endif; ?>



    <?php if(Auth::user()->type_id==2): ?>
                        <?php echo e(csrf_field()); ?>

                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <p class="alert alert-danger"><?php echo e($error); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                        <!-- <div class="form-group" style="width: 500x; height: 200px; ">
                            <div class="custom-file"> -->
                            <!-- <label for="name" class="col-md-4 control-label">Profile picture</label>
                                <div style="background-color: lightgrey;width:150px; height:150px;">
                                    <div id="image_preview"></div>
                                    <input type="file" class="custom-file-input" id="uploadFile" name="ImageForOrg"/> 
                                </div>
                            </div>
                        </div> -->
                        
                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Company Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(Auth::user()->name); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
                            <label for="phone" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="<?php echo e(Auth::user()->phone); ?>" required autofocus>

                                <?php if($errors->has('phone')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('phone')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(Auth::user()->email); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="address" class="form-control" name="address" value="<?php echo e(Auth::user()->address); ?>" required>

                                <?php if($errors->has('address')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('address')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        
                    
        
    <?php endif; ?>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Update
                                </button>
                            </div>
                        </div>
    </div>
    </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>