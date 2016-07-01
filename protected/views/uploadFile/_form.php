<?php
/* @var $this UploadFileController */
/* @var $model UploadFile */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'upload-file-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array('class'=>'form-horizontal',
						 'role'=>'form',
						 'enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">

		<?php echo $form->labelEx($model,'url',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
		<?php if (!empty($model->url)): ?>
	    	    <input id="ytuploadFile" type="hidden" value="<?php echo $model->url ?>" name="Blog[url]">
	    	    <input class="form-control" id="uploadFile" name="Blog[url]" type="file">
	    <?php else: ?>

	    		<?php echo $form->fileField($model,'url',array('class'=>'form-control','id'=>'uploadFile')); ?>
	    <?php endif; ?>
	    </div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'name',
								array(	'id'=>'name',
										'class'=>'form-control',
										'placeholder'=>'Enter name')); ?>
		<?php echo $form->error($model,'name',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'permission',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->dropDownList($model,'permission',
								array(	'0'=>'Member',
										'1'=>'VIP Only',
									),
								array(	'id'=>'permission',
										'class'=>'form-control',
										'placeholder'=>'Enter permission')); ?>
		<?php echo $form->error($model,'permission',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="well text-center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-color')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->