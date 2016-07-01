<div class="row">
<div class="col-sm-3">
  <div class="team-member user-avatar text-center">
    <?php echo CHtml::image(Load::Picture($data->picture),"picture",array("class"=>"img-responsive center-block")); ?>
    <?php echo $data->display_name; ?>
    <p class="text-muted"><?php echo Load::UserLevel($data->level_user); ?></p>
  </div>
</div>
<div class="col-sm-9">
  <div class="row">
    <div class="col-sm-7">
	  <h2 class="primary-font"><?php echo $data->display_name; ?></h2>
	  <p><i class="fa fa-user"></i> ชื่อผู้ใช้ : <?php echo $data->username; ?></p>
	  <p><i class="fa fa-calendar-o"></i> วันที่ลงทะเบียน : <span class="text-muted"><?php echo Load::Dateformat(($data->create_date)); ?></span></p>
	  <?php if(Yii::app()->user->isAdmin()): ?>
	  <p><i class="fa fa-phone-square"></i> หมายเลขโทรศัพท์ : <span class="text-muted"><?php echo $data->telephone; ?></span></p>
	  <p><i class="fa fa-envelope"></i> อีเมลล์ : <span class="text-muted"><?php echo CHtml::mailto($data->email, $data->email); ?></span></p>
	  <?php endif; ?>
	  
	</div>
	<div class="col-sm-5">
	  <ul class="user-info">
	    <li>Count login : <span class="text-muted"><?php echo $data->count_login; ?></span></li>
	    <li>Last login : <span class="text-muted"><?php echo Load::TimePassed($data->last_login); ?></span></li>
	  </ul>
	</div>
    <div class="col-sm-12">
      <hr class="arrow-down">
      
    </div>
  </div>
</div>
</div>