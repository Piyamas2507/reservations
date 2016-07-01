<?php
/* @var $this TranslateController */
/* @var $model Translate */

$this->breadcrumbs=array(
	'Translates'=>array('index'),
	$model->translate_id=>array('view','id'=>$model->translate_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Translate', 'url'=>array('create')),
	array('label'=>'Manage Translate', 'url'=>array('admin')),
);
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">Update Translate <?php echo $model->translate_id; ?></span></h2>

<?php if(Yii::app()->user->hasFlash('response')): ?>
<div class="info-board info-board-green">Update complete.</div>
    
<?php endif; ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>