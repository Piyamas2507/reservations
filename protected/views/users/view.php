<?php
$this->title=$model->display_name;
$this->description=$model->display_name;

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'รายการผู้ใช้ทั้งหมด', 'url'=>array('index')),
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
	array('label'=>'+ เพิ่มข้อมูลใหม่', 'url'=>array('create')),
	array('label'=>'แก้ไข', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'ลบ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'คุรต้องการลบข้อมูล?')),
);
?>
<div class="container">
<h2 class="headline first-child text-color"><span class="border-color">ข้อมูลผู้ใช้ #<?php echo $model->id; ?></span></h2>

  <div class="row">
    <div class="col-sm-3">
      <div class="team-member user-avatar text-center">
        <?php echo CHtml::image(Load::Picture($model->picture),"picture",array("class"=>"img-responsive center-block")); ?>
        <?php echo $model->display_name; ?>
        <p class="text-muted"><?php echo Load::UserLevel($model->level_user); ?></p>
      </div>
    </div>
    <div class="col-sm-9">
      <div class="row">
        <div class="col-sm-7">
		  <h2 class="primary-font"><?php echo $model->display_name; ?></h2>
		  <p><i class="fa fa-user"></i> ชื่อผู้ใช้ : <?php echo $model->username; ?></p>
		  <p><i class="fa fa-calendar-o"></i> วันที่ลงทะเบียน : <span class="text-muted"><?php echo Load::Dateformat(($model->create_date)); ?></span></p>
		  <?php if(Yii::app()->user->isAdmin()): ?>
		  <p><i class="fa fa-phone-square"></i> หมายเลขโทรศัพท์ : <span class="text-muted"><?php echo $model->telephone; ?></span></p>
		  <p><i class="fa fa-envelope"></i> อีเมลล์ : <span class="text-muted"><?php echo CHtml::mailto($model->email, $model->email); ?></span></p>
		  <?php endif; ?>
		  
		  
		</div>
		<div class="col-sm-5">
		  <ul class="user-info">
		    <li>Count login : <span class="text-muted"><?php echo $model->count_login; ?></span></li>
		    <li>Last login : <span class="text-muted"><?php echo Load::TimePassed($model->last_login); ?></span></li>
		  </ul>
		</div>
        <div class="col-sm-12">
          <hr class="arrow-down">
          
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