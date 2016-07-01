<?php
/* @var $this BlogCategoryController */
/* @var $model BlogCategory */

$this->breadcrumbs=array(
	'Blog Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List BlogCategory', 'url'=>array('index')),
	array('label'=>'Create BlogCategory', 'url'=>array('create')),
	array('label'=>'Update BlogCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BlogCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BlogCategory', 'url'=>array('admin')),
);
?>

<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">View BlogCategory #<?php echo $model->id; ?></span></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>'table table-hover table-condensed'),
	'attributes'=>array(
		'id',
		'name',
		'picture',
	),
)); ?>
</div>