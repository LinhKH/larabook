<?php $__env->startSection('content'); ?>

<div class="col-md-12 msgDiv" >

  <div style="background-color:#fff" class="col-md-3 pull-left">

    <div class="row" style="padding:10px">

       <div class="col-md-7">Friend List</div>
       <div class="col-md-5 pull-right">
         <a href="<?php echo e(url('/messages')); ?>" class="btn btn-sm btn-info">All messages</a>
       </div>
    </div>

   <?php $__currentLoopData = $friends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $friend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

   <li @click="friendID(<?php echo e($friend->id); ?>)" v-on:click="seen = true" style="list-style:none;
    margin-top:10px; background-color:#F3F3F3" class="row">

      <div class="col-md-3 pull-left">
           <img src="<?php echo e(Config::get('app.url')); ?>/public/img/<?php echo e($friend->pic); ?>"
         style="width:50px; border-radius:100%; margin:5px">
       </div>

      <div class="col-md-9 pull-left" style="margin-top:5px">
        <b> <?php echo e($friend->name); ?></b><br>
        <small>Gender: <?php echo e($friend->gender); ?></small>
     </div>
   </li>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <hr>
  </div>



  <div class="col-md-6 msg_main">
   <h3 align="center">Messages</h3>
<p class="alert alert-success">{{msg}}</p>

   <div  v-if="seen">
      <input type="hidden" v-model="friend_id">
      <textarea class="col-md-12 form-control" v-model="newMsgFrom"></textarea><br>
      <input type="button" value="send message" @click="sendNewMsg()">
  </div>

  </div>

  <div class="col-md-3 pull-right msg_right">
   <h3 align="center">User Information</h3>
   <hr>
  </div>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>