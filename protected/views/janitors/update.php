<?php
/* @var $this JanitorsController */
/* @var $model Janitors */

$this->breadcrumbs=array(
	'Janitors'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
	// array('label'=>'List Janitors', 'url'=>array('index')),
	array('label'=>'+ เพิ่มข้อมูลใหม่', 'url'=>array('create')),
	// array('label'=>'View Janitors', 'url'=>array('view', 'id'=>$model->id)),
);
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">แก้ไขข้อมูล #<?php echo $model->id; ?></span></h2>

<?php if(Yii::app()->user->hasFlash('response')): ?>
<div class="info-board info-board-green">แก้ไขข้อมูลสำเร็จ.</div>
    
<?php endif; ?>
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