<?php $__env->startSection('content'); ?>

<div class="container">

    <ol class="breadcrumb">
        <li><a href="<?php echo e(url('/home')); ?>">Home</a></li>
        <li><a href="<?php echo e(url('/profile')); ?>/<?php echo e(Auth::user()->slug); ?>">Profile</a></li>
        <li><a href="<?php echo e(url('/jobs')); ?>">Jobs</a></li>
        <li><?php echo e($jobs[0]->job_title); ?></li>
    </ol>


    <div class="row">
        <?php echo $__env->make('profile.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo e(Auth::user()->name); ?>, may you interested in these Jobs
                  <br>
                  <a href="<?php echo e(url('jobs')); ?>">All jobs</a>
                </div>

                <div class="panel-body">
                    <div class="col-sm-12 col-md-12 jobDetails">
                         <?php if( session()->has('msg') ): ?>
                         <p class="alert alert-success">
                                      <?php echo e(session()->get('msg')); ?>

                                   </p>
                                <?php endif; ?>
                        <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h4 >
                      <b><?php echo e(ucwords($job->name)); ?></b> need <b><?php echo e($job->job_title); ?></b>
                    </h4>

                    <div class="row job_company">

                      <div class="col-md-2 pull-left">
                      <img src="<?php echo e(Config::get('app.url')); ?>/public/img/<?php echo e($job->pic); ?>" class="img-rounded" style="width:100px; height:100px; margin:5px; border:1px solid #ddd; padding:5px">
                      </div>

                      <div class="col-md-10 pull-left">
                        <h3 style="font-size:18px; color:green">
                          <?php echo e(ucwords($job->name)); ?></h3>
                        <small><?php echo e($job->email); ?></small>
                      </div>

                    </div>

                        <div class="col-md-12" >
                          <h3 class="job_point">
                          Requirements: </h3>
                          <p><?php echo e($job->requirements); ?></p>
                        </div>

                        <div class="col-md-12" >
                          <h3 class="job_point">
                          Skills: </h3>
                          <p><?php echo e($job->skills); ?></p>
                        </div>

                        <div class="col-md-12" >
                          <h3 class="job_point">
                          How to Apply: </h3>
                          <p>Please send your awesome CV and PortFolio to email:
                          <a href="mailto:<?php echo e($job->contact_email); ?>" class="email_link"><?php echo e($job->contact_email); ?></a></p>
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