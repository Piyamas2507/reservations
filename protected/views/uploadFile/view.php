<?php
/* @var $this UploadFileController */
/* @var $model UploadFile */

$this->breadcrumbs=array(
	'Upload Files'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List UploadFile', 'url'=>array('index')),
	array('label'=>'Create UploadFile', 'url'=>array('create')),
	array('label'=>'Update UploadFile', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UploadFile', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UploadFile', 'url'=>array('admin')),
);
?>

<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">View UploadFile #<?php echo $model->id; ?></span></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>'table table-hover table-condensed'),
	'attributes'=>array(
		'id',
		'name',
		'url',
		'count',
	),
)); ?>
</div>