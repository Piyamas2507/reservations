<?php
/* @var $this NavigationBarController */
/* @var $model NavigationBar */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'navigation-bar-form',
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
		<?php echo $form->labelEx($model,'ชื่อเมนู',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'name',
								array(	'id'=>'name',
										'class'=>'form-control',
										'placeholder'=>'กรอกชื่อเมนู')); ?>
		<?php echo $form->error($model,'name',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'icon',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'icon',
								array(	'id'=>'icon',
										'class'=>'form-control',
										'placeholder'=>'ระบุ icon')); ?>
		<?php echo $form->error($model,'icon',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'สำหรับ',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->dropDownList($model,'dropdown',
				array('0'=>'สำหรับผู้ใช้ทั่วไป','888'=>'Make dropdown','999'=>'สำหรับผู้ดูแลระบบ')+CHtml::listData(NavigationBar::model()->findAll('dropdown=888'),'id','name'),
								array(	'id'=>'dropdown',
										'class'=>'form-control',
										'placeholder'=>'Enter dropdown')); ?>
		<?php echo $form->error($model,'dropdown',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'url',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'url',
								array(	'id'=>'url',
										'class'=>'form-control',
										'placeholder'=>'ระบุหน้า Url')); ?>
		<?php echo $form->error($model,'url',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="well text-center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก',array('class'=>'btn btn-color')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->