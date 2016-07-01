<?php
/* @var $this BlogController */
/* @var $model Blog */

$this->breadcrumbs=array(
	'Blogs'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Blog', 'url'=>array('index')),
	array('label'=>'Create Blog', 'url'=>array('create')),
	array('label'=>'View Blog', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Blog', 'url'=>array('admin')),
);
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">Update Blog <?php echo $model->id; ?></span></h2>

<?php if(Yii::app()->user->hasFlash('response')): ?>
<div class="info-board info-board-green">Update complete.</div>
    
<?php endif; ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>


</div>