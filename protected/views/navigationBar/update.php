<?php
/* @var $this NavigationBarController */
/* @var $model NavigationBar */

$this->breadcrumbs=array(
	'Navigation Bars'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'จัดการเมนู', 'url'=>array('admin')),
	array('label'=>'+ สร้างเมนู', 'url'=>array('create')),
	
);
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">แก้ไขเมนูที่ <?php echo $model->id; ?></span></h2>

<?php if(Yii::app()->user->hasFlash('response')): ?>
<div class="info-board info-board-green">ทำรายการสำเร็จ.</div>
    
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