<?php
/* @var $this NavigationBarController */
/* @var $model NavigationBar */

$this->breadcrumbs=array(
	'Navigation Bars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'จัดการเมนู', 'url'=>array('admin')),
);
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">สร้างเมนู</span></h2>

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