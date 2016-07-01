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

<div class="wide form">

<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl(\$this->route),
	'method'=>'get',
	'htmlOptions'=>array('class'=>'form-horizontal',
						 'role'=>'form',
						 'enctype' => 'multipart/form-data'),
)); ?>\n"; ?>

<?php foreach($this->tableSchema->columns as $column): ?>
<?php
	$field=$this->generateInputField($this->modelClass,$column);
	if(strpos($field,'password')!==false)
		continue;
?>
	<div class="form-group">
		<?php echo "<?php echo \$form->labelEx(\$model,'{$column->name}',array('class'=>'col-sm-2 control-label')); ?>\n"; ?>
		<div class="col-sm-10">
			<?php echo "<?php echo \$form->textField(\$model,'{$column->name}',
								array(	'id'=>'{$column->name}',
										'class'=>'form-control',
										'placeholder'=>'Enter {$column->name}')); ?>\n"; ?>
		<?php echo "<?php echo \$form->error(\$model,'{$column->name}',array('class'=>'text-danger')); ?>\n"; ?>
		</div>
	</div>

<?php endforeach; ?>
	<div class="text-center">
		<?php echo "<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-color')); ?>\n"; ?>
	</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- search-form -->