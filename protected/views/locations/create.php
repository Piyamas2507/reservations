<?php
/* @var $this LocationsController */
/* @var $model Locations */

$this->breadcrumbs=array(
	'Locations'=>array('index'),
	'Create',
);

$this->menu=array(
	// array('label'=>'ตารางข้อมูลอาคารสถานที่', 'url'=>array('index')),
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
	array('label'=>'ตารางข้อมูลอาคารสถานที่', 'url'=>array('index')),
);
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">เพิ่มข้อมูลอาคารสถานที่</span></h2>
<!-- <a href="<?php echo Yii::app()->request->baseUrl; ?>/locations/admin" class="btn btn-primary btn-md" role="button" style="color:#fff;"><i class="fa fa-wrench"></i> จัดการข้อมูล</a>
 -->
 <?php $this->renderPartial('_form', array('model'=>$model)); ?>
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