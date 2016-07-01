<div class="container">
<?php
/* @var $this ReservationsController */
/* @var $model Reservations */

$this->breadcrumbs=array(
	'Reservations'=>array('index'),
	$model->name,
);

$this->menu=array(
	// array('label'=>'รายการคำร้องขอใช้บริการ', 'url'=>array('index')),
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
	array('label'=>'+ เพิ่มข้อมูลใหม่', 'url'=>array('create')),
	array('label'=>'แก้ไข', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'ลบ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'คุณต้องการลบข้อมูลการขอใช้บริการ?')),
);
?>


<div class="text-center" >
<?php if($model->status==3): ?>
<a target=_blank href="<?php echo Yii::app()->request->baseUrl; ?>/reservations/print/id/<?php echo $model->id; ?>" type="button" class="btn btn-success btn-lg" ><FONT COLOR=#fff><i class="fa fa-print"></i> พิมพ์ใบอนุญาติ</FONT></a>

<?php else: ?>
<button type="button" class="btn btn-primary btn-lg disabled"><i class="fa fa-print"></i> พิมพ์ใบอนุญาต</button>
<?php endif; ?>
</div>

<h3 class="headline first-child text-color text-center"><span class="border-color">แบบฟอร์มการขอใช้อาคารสถานที่ เลขที่ <?php echo $model->id; ?></span></h3>

<?php if(Yii::app()->user->hasFlash('response')): ?>
<div class="info-board info-board-green">บันทึกรายการสำเร็จ โปรดจำเลขที่คำร้องเพื่อใช้ตรวจสอบรายการอนุมัติ (หากต้องการยกเลิกคำร้อง กรุณาติดต่อเจ้าหน้าที่)</div>
<?php endif; ?>
<?php if(Yii::app()->user->isGuest):?>
<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			</div>
				<div class="panel-body">	
				<dl class="dl-horizontal">
				  <dt>สถานะ</dt><dd><?php Library::Status($model->status); ?></dd>
				  <dt>ชื่อ สกุล</dt><dd><?php echo $model->title.' '.$model->name.' '.$model->lastname; ?></dd>
				  <dt>ขอใช้</dt><dd><?php if (Locations::model()->findByPk($model->location_id)){
													  $location_id = Locations::model()->findByPk($model->location_id);
													  echo $location_id->name; }
													  ?></dd>
				  <dt>วันที่ยื่นคำร้อง</dt><dd><?php echo Load::Dateformat($model->create); ?></dd>
				  <dt>ตั้งแต่วันที่</dt><dd><?php echo Load::Dateformat($model->datestart); ?> <b>เวลา</b> <?php echo $model->timestart; ?> น. </dd>
				  <dt>ถึงวันที่</dt><dd><?php echo Load::Dateformat($model->dateend); ?> <b>เวลา</b> <?php echo $model->timeend; ?> น. </dd>
				  <dt>วัตถุประสงค์</dt><dd><?php echo $model->detail; ?></dd>
				  <dt>จำนวนผู้เข้าใช้</dt><dd><?php echo $model->volumn; ?> คน</dd>
				  <dt>หมายเหตุ</dt><dd><?php echo $model->comment; ?></dd>
				 
				</dl>
		</div>
		</div>
</div>
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

<?php else: ?>
<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
			<b>ข้อมูลผู้ขอใช้บริการ</b>
			</div>
				<div class="panel-body">	
				<dl class="dl-horizontal">
				  <dt>ชื่อ สกุล</dt><dd><?php echo $model->title.' '.$model->name.' '.$model->lastname; ?></dd>
				  <dt>สถานะ</dt><dd><?php Library::reservationstatus($model->status_id); ?></dd>
				  <dt>ตำแหน่ง</dt><dd><?php echo $model->position; ?></dd>
				  <dt>หน่วยงาน</dt><dd><?php if (Departments::model()->findByPk($model->department)){
													  $department = Departments::model()->findByPk($model->department);
													  echo $department->name; }
													  ?></dd>
				  <dt>หมายเลขบัตรประชาชน</dt><dd><?php echo $model->code; ?></dd>
				  <dt>หมายเลขโทรศัพท์</dt><dd><?php echo $model->phone; ?></dd>
				</dl>
		</div>
		</div>
</div>

<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
			<b>ข้อมูลคำร้องขอใช้บริการ</b>
			</div>
				<div class="panel-body">	
				<dl class="dl-horizontal">
				  <dt>สถานะ</dt><dd><?php Library::Status($model->status); ?></dd>
				  <dt>ขอใช้</dt><dd><?php if (Locations::model()->findByPk($model->location_id)){
													  $location_id = Locations::model()->findByPk($model->location_id);
													  echo $location_id->name; }
													  ?></dd>
				  <dt>วันที่ยื่นคำร้อง</dt><dd><?php echo Load::Dateformat($model->create); ?></dd>
				  <dt>ตั้งแต่วันที่</dt><dd><?php echo Load::Dateformat($model->datestart); ?> <b>เวลา</b> <?php echo $model->timestart; ?> น. </dd>
				  <dt>ถึงวันที่</dt><dd><?php echo Load::DAteformat($model->dateend); ?> <b>เวลา</b> <?php echo $model->timeend; ?> น. </dd>
				  <dt>วัตถุประสงค์</dt><dd><?php echo $model->detail; ?></dd>
				  <dt>จำนวนผู้เข้าใช้</dt><dd><?php echo $model->volumn; ?> คน</dd>
				  <dt>หมายเหตุ</dt><dd><?php echo $model->comment; ?></dd>
				 
				</dl>
		</div>
		</div>
</div>
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
<?php endif; ?>
</div>