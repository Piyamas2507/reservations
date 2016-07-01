<!-- Extra Bar -->
  <div class="mini-navbar mini-navbar-dark hidden-xs">
    <div class="container">
      <div class="col-sm-12">
        <!-- <a href="mailto:<?php echo Yii::app()->params['contact']['email']; ?>" class="first-child"><i class="fa fa-envelope"></i> Email<span class="hidden-sm">: <?php echo Yii::app()->params['contact']['email']; ?></span></a>
        <span class="phone">
          <i class="fa fa-phone-square"></i> Tel.: <?php echo Yii::app()->params['contact']['mobile']; ?>
        </span> -->
<?php if(Yii::app()->user->isGuest): ?>
        <!--<?php echo CHtml::link('<i class="fa fa-arrow-circle-down"></i> '.Yii::t('app','Register'),array('site/register'),array('class'=>'pull-right')); ?>-->
<!--         <div class="text-left">
              <button onclick="goBack()" class="btn btn-primary btn-sm" role="button" style="color:#fff;"><i class="fa fa-reply"></i> ย้อนกลับ</button>

              <script>
              function goBack() {
                  window.history.back()
              }
              </script>
        </div> -->
        <?php echo CHtml::link('<i class="fa fa-sign-in"></i> '.Yii::t('app','เข้าสู่ระบบ'),array('site/login'),array('class'=>'pull-right')); ?>
<?php else: ?>
        <?php echo CHtml::link('<i class="fa fa-sign-out"></i> '.Yii::t('app','ออกจากระบบ'),array('site/Logout'),array('class'=>'pull-right')); ?>
        <?php echo CHtml::link(CHtml::image(Load::Picture(Yii::app()->user->detail->picture),"picture",array("width"=>"14px")).' '.Yii::app()->user->detail->display_name,array('users/profile'),array('class'=>'pull-right')); ?> 
<?php endif; ?>
        <!-- <a href="#" class="pull-right" id="nav-search"><i class="fa fa-search"></i> <?php echo Yii::t('app','Search'); ?></a> -->
        <a href="#" class="pull-right hidden" id="nav-search-close"><i class="fa fa-times"></i></a>
        <!-- Search Form -->
        <form class="pull-right hidden" role="search" id="nav-search-form" method="get" action="<?php echo Yii::app()->request->baseUrl; ?>/blog">
          <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="<?php echo Yii::t('app','Search'); ?>">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>