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

<?php echo "<?php \$form=\$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	'type'=>'horizontal',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    'htmlOptions'=>array('role'=>'form',
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
		<?php echo "<?php echo \$form->textFieldRow(\$model,'{$column->name}'); ?>\n"; ?>

<?php
}
?>
		<div class="form-actions">
			<?php echo "<?php echo CHtml::submitButton('Update',array('class'=>'btn btn-primary')); ?>\n"; ?>	  	
		</div>


<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->