<?php
/* @var $this LocationsgalleryController */
/* @var $model Locationsgallery */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'htmlOptions'=>array('class'=>'form-horizontal',
						 'role'=>'form',
						 'enctype' => 'multipart/form-data'),
)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'id',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'id',
								array(	'id'=>'id',
										'class'=>'form-control',
										'placeholder'=>'Enter id')); ?>
		<?php echo $form->error($model,'id',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'picture',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'picture',
								array(	'id'=>'picture',
										'class'=>'form-control',
										'placeholder'=>'Enter picture')); ?>
		<?php echo $form->error($model,'picture',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'location_id',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'location_id',
								array(	'id'=>'location_id',
										'class'=>'form-control',
										'placeholder'=>'Enter location_id')); ?>
		<?php echo $form->error($model,'location_id',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="text-center">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-color')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->