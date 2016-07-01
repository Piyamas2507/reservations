<?php
/* @var $this JanitorsController */
/* @var $model Janitors */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'janitors-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array('class'=>'form-horizontal',
						 'role'=>'form',
						 'enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">ช่องที่มีเครื่องหมาย <span class="required">*</span> ไม่ควรเป็นค่าว่าง.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'title',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->dropDownList($model,'title',
								array(	'นาย'=>'นาย',
										'นาง'=>'นาง',
										'นางสาว'=>'นางสาว',
									),
								array(	'id'=>'title',
										'class'=>'form-control',
										'placeholder'=>'Enter title')); ?>
		<?php echo $form->error($model,'title',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'name',
								array(	'id'=>'name',
										'class'=>'form-control',
										'placeholder'=>'กรอกชื่อ')); ?>
		<?php echo $form->error($model,'name',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'lastname',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'lastname',
								array(	'id'=>'lastname',
										'class'=>'form-control',
										'placeholder'=>'กรอกนามสกุล')); ?>
		<?php echo $form->error($model,'lastname',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<!-- <div class="form-group">
		<?php echo $form->labelEx($model,'phone',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'phone',
								array(	'id'=>'phone',
										'class'=>'form-control',
										'placeholder'=>'Enter phone')); ?>
		<?php echo $form->error($model,'phone',array('class'=>'text-danger')); ?>
		</div>
	</div> -->
	<div class="form-group">
		<?php echo $form->labelEx($model,'phone',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php $this->widget('CMaskedTextField',array(
                  'model'=>$model,
                  'attribute'=>'phone',
                  'name'=>'phone',
                  'mask'=>'(999)999-9999',
                  'htmlOptions'=>array(
                      'class'=>'form-control',
                      'placeholder'=>Yii::t('app','(___)___-____'),
                  )));?>
		</div>
	</div>

	<div class="well text-center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก',array('class'=>'btn btn-color')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->