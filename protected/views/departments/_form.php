<?php
/* @var $this DepartmentsController */
/* @var $model Departments */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'departments-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array('class'=>'form-horizontal',
						 'role'=>'form',
						 'enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">ช่องที่มีเครื่องหมาย <span class="required">*</span> ไม่ควรเป็นค่าว่าง</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'name',
								array(	'id'=>'name',
										'class'=>'form-control',
										'placeholder'=>'กรอกชื่อหน่วยงาน')); ?>
		<?php echo $form->error($model,'name',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="well text-center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก',array('class'=>'btn btn-color')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->