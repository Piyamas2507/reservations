<?php
/* @var $this BlogCategoryController */
/* @var $model BlogCategory */

$this->breadcrumbs=array(
	'Blog Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BlogCategory', 'url'=>array('index')),
	array('label'=>'Create BlogCategory', 'url'=>array('create')),
	array('label'=>'View BlogCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BlogCategory', 'url'=>array('admin')),
);
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">Update BlogCategory <?php echo $model->id; ?></span></h2>

<?php if(Yii::app()->user->hasFlash('response')): ?>
<div class="info-board info-board-green">Update complete.</div>
    
<?php endif; ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->renderPartial('admin', array('model'=>$lists)); ?>
</div>