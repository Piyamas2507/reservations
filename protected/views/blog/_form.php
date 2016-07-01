<?php
/* @var $this BlogController */
/* @var $model Blog */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'blog-form',
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
	    		<?php echo $form->fileField($model,'picture',array('class'=>'form-control','id'=>'uploadFile')); ?>
	    	<?php echo $form->error($model,'picture',array('class'=>'text-danger')); ?>
	    </div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'title',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'title',
								array(	'id'=>'title',
										'class'=>'form-control',
										'placeholder'=>'Enter title')); ?>
		<?php echo $form->error($model,'title',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'description',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'description',
								array(	'id'=>'description',
										'class'=>'form-control',
										'placeholder'=>'Enter description')); ?>
		<?php echo $form->error($model,'description',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'keyword',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'keyword',
								array(	'id'=>'keyword',
										'class'=>'form-control',
										'placeholder'=>'Enter keyword')); ?>
		<?php echo $form->error($model,'keyword',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'category',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->dropDownList($model,'category',
				CHtml::listData(BlogCategory::model()->findAll(),'id','name'),
								array(	'id'=>'category',
										'class'=>'form-control',
										'placeholder'=>'Enter category')); ?>
		<?php echo $form->error($model,'category',array('class'=>'text-danger')); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'status',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->dropDownList($model,'status',
								array(	'0'=>'Draft',
										'1'=>'Public',
									),
								array(	'id'=>'status',
										'class'=>'form-control',
										'placeholder'=>'Enter status')); ?>
		<?php echo $form->error($model,'status',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		
		<div class="col-sm-12">
			<?php echo $form->textArea($model,'content',
								array(	'id'=>'content',
										'class'=>'ckeditor',)); ?>

			<script src="<?php echo Yii::app()->theme->baseUrl; ?>/ckeditor/ckeditor.js" type="text/javascript"></script>

		<?php echo $form->error($model,'content',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'slug',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'slug',
								array(	'id'=>'slug',
										'class'=>'form-control',
										'placeholder'=>'Enter slug')); ?>
		<?php echo $form->error($model,'slug',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="well text-center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-color')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->