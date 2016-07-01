<?php
/* @var $this UploadFileController */
/* @var $model UploadFile */

$this->breadcrumbs=array(
	'Upload Files'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UploadFile', 'url'=>array('index')),
	array('label'=>'Manage UploadFile', 'url'=>array('admin')),
);
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">Create UploadFile</span></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>