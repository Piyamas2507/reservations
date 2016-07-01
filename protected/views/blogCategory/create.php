<?php
/* @var $this BlogCategoryController */
/* @var $model BlogCategory */

$this->breadcrumbs=array(
	'Blog Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BlogCategory', 'url'=>array('index')),
	array('label'=>'Manage BlogCategory', 'url'=>array('admin')),
);
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">Create BlogCategory</span></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>