<?php
/* @var $this TranslateController */
/* @var $model Translate */

$this->breadcrumbs=array(
	'Translates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Translate', 'url'=>array('admin')),
);
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">Create Translate</span></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>