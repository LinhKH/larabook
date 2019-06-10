<?php $__env->startSection('content'); ?>
<div class="container">

    <ol class="breadcrumb">
        <li><a href="<?php echo e(url('/home')); ?>">Home</a></li>
        <li><a href="<?php echo e(url('/profile')); ?>/<?php echo e(Auth::user()->slug); ?>">Profile</a></li>
        <li><a href="">Friends</a></li>
    </ol>


    <div class="row">
        <?php echo $__env->make('profile.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo e(Auth::user()->name); ?>, Your Friends</div>

                <div class="panel-body">
                    <div class="col-sm-12 col-md-12">
                         <?php if( session()->has('msg') ): ?>
                         <p class="alert alert-success">
                                      <?php echo e(session()->get('msg')); ?>

                                   </p>
                                <?php endif; ?>
                        <?php $__currentLoopData = $friends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="row" style="border-bottom:1px solid #ccc; margin-bottom:15px">
                            <div class="col-md-2 pull-left">
                                <img src="<?php echo e(url('../')); ?>/public/img/<?php echo e($uList->pic); ?>" width="80px" height="80px" class="img-rounded"/>
                            </div>

                            <div class="col-md-7 pull-left">
                                <h3 style="margin:0px;"><a href=""><?php echo e(ucwords($uList->name)); ?></a></h3>
                                <p><b>Gender:</b> <?php echo e($uList->gender); ?></p>
                                   <p><b>Email:</b> <?php echo e($uList->email); ?></p>
                            </div>

                            <div class="col-md-3 pull-right">

                                     <p>

                                         <a href="<?php echo e(url('/unfriend')); ?>/<?php echo e($uList->id); ?>"  class="btn btn-default btn-sm">UnFriend</a>

                                     </p>

                            </div>

                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>