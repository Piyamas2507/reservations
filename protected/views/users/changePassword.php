<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <div class="team-member user-avatar text-center">
        <?php echo CHtml::image(Load::Picture(Yii::app()->user->detail->picture),"picture",array("class"=>"img-responsive center-block")); ?>
        <?php echo Yii::app()->user->detail->display_name; ?>
        <p class="text-muted"><?php echo Load::UserLevel(Yii::app()->user->detail->level_user); ?></p>
      </div>
      <ul class="nav nav-pills nav-stacked">
        <li><?php echo CHtml::link(Yii::t('app','ข้อมูลส่วนตัว'),array('users/profile')); ?></li>
        <li><?php echo CHtml::link(Yii::t('app','แก้ไขข้อมูลส่วนตัว'),array('users/editProfile')); ?></li>
        <li class="active"><?php echo CHtml::link(Yii::t('app','เปลี่ยนรหัสผ่าน'),array('users/changePassword')); ?></li>
        <li><?php echo CHtml::link('<i class="fa fa-sign-out"></i> '.Yii::t('app','ออกจากระบบ'),array('site/Logout')); ?></li>

      </ul>
    </div>
    <div class="col-sm-9">
      <div class="row">
        <?php $this->renderPartial('_detailProfile'); ?>
        <div class="col-sm-12">
          <hr class="arrow-down">
			<?php if(Yii::app()->user->hasFlash('response')): ?>
			<div class="info-board info-board-green">Change Password complete.</div>
			<?php endif; ?>
          <?php $this->renderPartial('_changePassword',array('model'=>$model)) ?>
        </div>
      </div>
    </div>
  </div> <!-- / .row -->
  <!-- <ปุ่มย้นกลับ> -->
<div class="text-center">
<button onclick="goBack()" class="btn btn-primary btn-md" role="button" style="color:#fff;"><i class="fa fa-reply"></i> ย้อนกลับ</button>
<a href="<?php echo Yii::app()->request->baseUrl; ?>/site/index" class="btn btn-warning btn-md" role="button" style="color:#fff;"><i class="fa fa-home"></i> กลับสู่หน้าหลัก</a>

<script>
function goBack() {
    window.history.back()
}
</script>
</div>
<!-- <ปุ่มย้นกลับ> -->
</div>