<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
/* @var $form CActiveForm */
?>

<div class="form">

<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array('class'=>'form-horizontal',
						 'role'=>'form',
						 'enctype' => 'multipart/form-data'),
)); ?>\n"; ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement)
		continue;
?>
	<div class="form-group">
		<?php echo "<?php echo \$form->labelEx(\$model,'{$column->name}',array('class'=>'col-sm-4 control-label')); ?>\n"; ?>
		<div class="col-sm-6">
			<?php echo "<?php echo \$form->textField(\$model,'{$column->name}',
								array(	'id'=>'{$column->name}',
										'class'=>'form-control',
										'placeholder'=>'Enter {$column->name}')); ?>\n"; ?>
		<?php echo "<?php echo \$form->error(\$model,'{$column->name}',array('class'=>'text-danger')); ?>\n"; ?>
		</div>
	</div>
<?php
}
?>
	<div class="col-md-10 col-md-offset-1 well">
		<div class="col-md-6 col-md-offset-3 ">
		<?php echo "<?php echo CHtml::submitButton(\$model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn-small btn-color btn-pad')); ?>\n"; ?>
		</div>
	</div>	


<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->