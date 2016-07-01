<?php
/* @var $this LocationsController */
/* @var $model Locations */
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

	<!-- <div class="form-group">
		<?php echo $form->labelEx($model,'name',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'name',
								array(	'id'=>'name',
										'class'=>'form-control',
										'placeholder'=>'Enter name')); ?>
		<?php echo $form->error($model,'name',array('class'=>'text-danger')); ?>
		</div>
	</div> -->

	<!-- <div class="form-group">
		<?php echo $form->labelEx($model,'type',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'type',
								array(	'id'=>'type',
										'class'=>'form-control',
										'placeholder'=>'Enter type')); ?>
		<?php echo $form->error($model,'type',array('class'=>'text-danger')); ?>
		</div>
	</div> -->

	<?php 
	$data1 = Locationtypes::model()->findAll();
	$result1['']='ทั้งหมด';
	foreach ($data1 as $key => $value1) {
		$result1[$value1->id] = $value1->name;
	}?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'type',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->dropDownList($model,'type',
				$result1,
								array(	'id'=>'type',
										'class'=>'form-control',
										'placeholder'=>'Enter type')); ?>
		<?php echo $form->error($model,'type',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<?php 
	$data = Janitors::model()->findAll();
	$result['']='ทั้งหมด';
	foreach ($data as $key => $value) {
		$result[$value->id] = $value->title.' '.$value->name.' '.$value->lastname;
	}?>
	<!-- <div class="form-group">
		<?php echo $form->labelEx($model,'janitor_id',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->dropDownList($model,'janitor_id',
				$result,
								array(	'id'=>'janitor_id',
										'class'=>'form-control',
										'placeholder'=>'Enter janitor_id')); ?>
		<?php echo $form->error($model,'janitor_id',array('class'=>'text-danger')); ?>
		</div>
	</div> -->

	<div class="form-group">
		<?php echo $form->labelEx($model,'status',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->dropDownList($model,'status',
								array(	''=>'ทั้งหมด',
										'1'=>'พร้อมใช้งาน',
										'0'=>'ไม่พร้อมใช้งาน',
									),
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