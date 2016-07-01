<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>
<div class="container text-center">
	<h2><?php echo CHtml::encode($message); ?></h2>
<button onclick="goBack()" class="btn btn-primary btn-lg" style="color:#fff;"><i class="fa fa-reply"></i> ย้อนกลับ</button>

<script>
function goBack() {
    window.history.back()
}
</script>
</div>