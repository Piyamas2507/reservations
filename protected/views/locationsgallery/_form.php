<?php
/* @var $this LocationsgalleryController */
/* @var $model Locationsgallery */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'locationsgallery-form',
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

	<?php 	if(!empty($model->picture)): echo '
	<div class="form-group">
	<div class="col-md-6 col-md-offset-4 ">
	<img src="'.Yii::app()->request->baseUrl.$model->picture.'" style="height:100px;">
	</div></div>';
			else :echo '<div class="form-group">
	<div class="col-md-6 col-md-offset-4 ">no image</div></div>';
			endif; ?>

	<div class="form-group">

		<?php echo $form->labelEx($model,'picture',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
	    		<?php echo $form->fileField($model,'picture',array('class'=>'form-control','id'=>'uploadFile')); ?>
	    	<?php echo $form->error($model,'picture',array('class'=>'text-danger')); ?>
	    </div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'location_id',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->dropDownList($model,'location_id',
				CHtml::listData(Locations::model()->findAll(),'id','name'),
								array(	'id'=>'location_id',
										'class'=>'form-control',
										'placeholder'=>'Enter location_id')); ?>
		<?php echo $form->error($model,'location_id',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="well text-center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก',array('class'=>'btn btn-color')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->