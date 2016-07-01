<?php
/* @var $this BlogCategoryController */
/* @var $model BlogCategory */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'blog-category-form',
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
		<?php if (!empty($model->picture)): ?>
	    	    <input id="ytuploadFile" type="hidden" value="<?php echo $model->picture ?>" name="Blog[picture]">
	    	    <input class="form-control" id="uploadFile" name="Blog[picture]" type="file">
	    <?php else: ?>

	    		<?php echo $form->fileField($model,'picture',array('class'=>'form-control','id'=>'uploadFile')); ?>
	    <?php endif; ?>
	    </div>
	    <?php //script change style upload ?>
	    <script>//document.getElementById("uploadBtn").onchange=function(){document.getElementById("uploadFile").value=this.value;};</script>
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
	
	<div class="well text-center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-color')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->