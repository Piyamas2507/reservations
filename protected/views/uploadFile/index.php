<?php
/* @var $this UploadFileController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Upload Files',
);
$this->bodyColor='body-green';

$this->menu=array(
	array('label'=>'Create UploadFile', 'url'=>array('create')),
	array('label'=>'Manage UploadFile', 'url'=>array('admin')),
);
?>
<div class="container">
<div class="row text-center">
<div class="col-md-6">
	<a href="http://www.palaloy.com/blog/สูตรสำเร็จ-อิสระภาพทางการเงิน-จาก-robot-forex-โดย-ก-เกม" target="_blank">
	<img class="img-responsive" 
	src="http://www.palaloy.com/upload/BlogPicture/สูตรสำเร็จ-อิสระภาพทางการเงิน-จาก-robot-forex-โดย-ก-เกม-1408514792.jpg"/>
	</a>
	<a href="/blog/%E0%B8%AA%E0%B8%B9%E0%B8%95%E0%B8%A3%E0%B8%AA%E0%B8%B3%E0%B9%80%E0%B8%A3%E0%B9%87%E0%B8%88-%E0%B8%AD%E0%B8%B4%E0%B8%AA%E0%B8%A3%E0%B8%B0%E0%B8%A0%E0%B8%B2%E0%B8%9E%E0%B8%97%E0%B8%B2%E0%B8%87%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%87%E0%B8%B4%E0%B8%99-%E0%B8%88%E0%B8%B2%E0%B8%81-robot-forex-%E0%B9%82%E0%B8%94%E0%B8%A2-%E0%B8%81-%E0%B9%80%E0%B8%81%E0%B8%A1">สูตรสำเร็จ อิสระภาพทางการเงิน จาก Robot Forex โดย ก.เกม</a>
</div>
<div class="col-md-6">
	<div class="emyoutube"><iframe frameborder="0" src="http://www.youtube.com/embed/rkk9Js-5_P4"></iframe></div>
	วิธีการติดตั้ง Robot Forex
</div>
</div>
<h2 class="headline first-child text-color"><span class="border-color">Download</span></h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'template'=>"{pager}\n{items}\n{pager}",
	'pagerCssClass'=>'text-center col-sm-12',
	'pager' => array('header'=>'','htmlOptions'=>array('class'=>'pagination',)),
	'itemView'=>'_view',
)); ?>

</div>