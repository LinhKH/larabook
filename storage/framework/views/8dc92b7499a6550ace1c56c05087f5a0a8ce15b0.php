 <div class="col-md-3 left-sidebar">
            <div class="panel panel-default">
                <div class="panel-heading">Sidebar - Quick Links</div>

                <?php if(Auth::check()): ?>
                   <ul>
                     <li>
                       <a href="<?php echo e(url('/profile')); ?>/<?php echo e(Auth::user()->slug); ?>">
                          <img src="<?php echo e(Config::get('app.url')); ?>/public/img/<?php echo e(Auth::user()->pic); ?>"
                       width="32" style="margin:5px"  />
                       <?php echo e(Auth::user()->name); ?></a>
                     </li>
                     <li>
                       <a href="<?php echo e(url('/')); ?>"> <img src="<?php echo e(Config::get('app.url')); ?>/public/img/news_feed.png"
                       width="32" style="margin:5px"  />
                       News Feed</a>
                     </li>
                     <li>
                       <a href="<?php echo e(url('/friends')); ?>"> <img src="<?php echo e(Config::get('app.url')); ?>/public/img/friends.png"
                       width="32" style="margin:5px"  />
                       Friends </a>
                     </li>
                     <li>
                       <a href="<?php echo e(url('/messages')); ?>"> <img src="<?php echo e(Config::get('app.url')); ?>/public/img/msg.png"
                       width="32" style="margin:5px"  />
                      Messages</a>
                     </li>

                     <li>
                       <a href="<?php echo e(url('/findFriends')); ?>"> <img src="<?php echo e(Config::get('app.url')); ?>/public/img/friends.png"
                       width="32" style="margin:5px"  />
                      Find Friends</a>
                     </li>

                     <li>
                       <a href="<?php echo e(url('/jobs')); ?>"> <img src="<?php echo e(Config::get('app.url')); ?>/public/img/jobs.png"
                       width="32" style="margin:5px"  />
                      Find Jobs</a>
                     </li>
                   </ul>
                   <?php endif; ?>
            </div>
        </div>
