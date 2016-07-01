<?php
/* @var $this BlogController */
/* @var $model Blog */
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
		<?php echo $form->labelEx($model,'slug',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'slug',
								array(	'id'=>'slug',
										'class'=>'form-control',
										'placeholder'=>'Enter slug')); ?>
		<?php echo $form->error($model,'slug',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'content',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'content',
								array(	'id'=>'content',
										'class'=>'form-control',
										'placeholder'=>'Enter content')); ?>
		<?php echo $form->error($model,'content',array('class'=>'text-danger')); ?>
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
		<?php echo $form->labelEx($model,'category',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'category',
								array(	'id'=>'category',
										'class'=>'form-control',
										'placeholder'=>'Enter category')); ?>
		<?php echo $form->error($model,'category',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'user',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'user',
								array(	'id'=>'user',
										'class'=>'form-control',
										'placeholder'=>'Enter user')); ?>
		<?php echo $form->error($model,'user',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'view',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'view',
								array(	'id'=>'view',
										'class'=>'form-control',
										'placeholder'=>'Enter view')); ?>
		<?php echo $form->error($model,'view',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'create',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'create',
								array(	'id'=>'create',
										'class'=>'form-control',
										'placeholder'=>'Enter create')); ?>
		<?php echo $form->error($model,'create',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'rating',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'rating',
								array(	'id'=>'rating',
										'class'=>'form-control',
										'placeholder'=>'Enter rating')); ?>
		<?php echo $form->error($model,'rating',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'status',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'status',
								array(	'id'=>'status',
										'class'=>'form-control',
										'placeholder'=>'Enter status')); ?>
		<?php echo $form->error($model,'status',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="text-center">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-color')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->