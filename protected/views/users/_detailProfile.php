<div class="col-sm-7">
  <h2 class="primary-font"><?php echo Yii::app()->user->detail->display_name; ?></h2>
  <p><i class="fa fa-user"></i> ชื่อผู้ใช้ : <?php echo Yii::app()->user->detail->username; ?></p>
  <p><i class="fa fa-calendar-o"></i> วันที่ลงทะเบียน : <span class="text-muted"><?php echo Load::Dateformat((Yii::app()->user->detail->create_date)); ?></span></p>
  <p><i class="fa fa-phone-square"></i> วันที่ลงทะเบียน : <span class="text-muted"><?php echo Yii::app()->user->detail->telephone; ?></span></p>
  <p><i class="fa fa-envelope"></i> อีเมลล์ : <span class="text-muted"><?php echo CHtml::mailto(Yii::app()->user->detail->email, Yii::app()->user->detail->email); ?></span></p>
  
  
</div>
<div class="col-sm-5">
  <ul class="user-info">
    <li>Count login : <span class="text-muted"><?php echo Yii::app()->user->detail->count_login; ?></span></li>
    <li>Last login : <span class="text-muted"><?php echo Load::TimePassed(Yii::app()->user->detail->last_login); ?></span></li>
  </ul>
</div>