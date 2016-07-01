<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <div class="team-member user-avatar text-center">
        <?php echo CHtml::image(Load::Picture(Yii::app()->user->detail->picture),"picture",array("class"=>"img-responsive center-block")); ?>
        <?php echo Yii::app()->user->detail->display_name; ?>
        <p class="text-muted"><?php echo Load::UserLevel(Yii::app()->user->detail->level_user); ?></p>
      </div>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><?php echo CHtml::link(Yii::t('app','ข้อมูลส่วนตัว'),array('users/profile')); ?></li>
        <li><?php echo CHtml::link(Yii::t('app','แก้ไขข้อมูลส่วนตัว'),array('users/editProfile')); ?></li>
        <li><?php echo CHtml::link(Yii::t('app','เปลี่ยนรหัสผ่าน'),array('users/changePassword')); ?></li>
        <li><?php echo CHtml::link('<i class="fa fa-sign-out"></i> '.Yii::t('app','ออกจากระบบ'),array('site/Logout')); ?></li>

      </ul>
    </div>
    <div class="col-sm-9">
        <div class="row">
            <?php $this->renderPartial('_detailProfile'); ?>
        </div>
        <div class="row">
          <div class="col-sm-12">
          <?php if(Yii::app()->user->hasFlash('response')): ?>
            <div class="info-board info-board-green">ทำรายการสำเร็จ</div>
          <?php endif; ?>
          <?php if(Users::model()->findByPk(Yii::app()->user->id)->level_user > 1): ?>
            <?php $this->widget('zii.widgets.CListView', array(
              'dataProvider'=>$dataProvider,
              'template'=>"{pager}\n{items}\n{pager}",
              'pagerCssClass'=>'text-center col-sm-12',
              'pager' => array('header'=>'','htmlOptions'=>array('class'=>'pagination',)),
              'itemView'=>'_view_reservations',
            )); ?>
          <?php endif; ?>
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