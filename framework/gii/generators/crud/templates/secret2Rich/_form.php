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
	<div class="group-name">
		<?php echo "<?php echo \$form->labelEx(\$model,'{$column->name}',array('class'=>'')); ?>\n"; ?>
		<span>
			<?php echo "<?php echo \$form->textField(\$model,'{$column->name}',
								array(	'id'=>'{$column->name}',
										'class'=>'form-control',
										'placeholder'=>'Enter {$column->name}')); ?>\n"; ?>
		<?php echo "<?php echo \$form->error(\$model,'{$column->name}',array('class'=>'text-danger')); ?>\n"; ?>
		</span>
	</div>

<?php
}
?>
	<div class="group-btn indent">
	<span>
		<?php echo "<?php echo CHtml::submitButton(\$model->isNewRecord ? 'Create' : 'Save',array('class'=>'button big Red')); ?>\n"; ?>
	</span>
	</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->