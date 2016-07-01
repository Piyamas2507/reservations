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
)); ?>\n"; ?>

<?php foreach($this->tableSchema->columns as $column): ?>
<?php
	$field=$this->generateInputField($this->modelClass,$column);
	if(strpos($field,'password')!==false)
		continue;
?>
	<div class="form-group">
		<?php echo "<?php echo \$form->labelEx(\$model,'{$column->name}',array('class'=>'col-sm-4 control-label')); ?>\n"; ?>
		    <div class="col-md-6">
			<?php echo "<?php echo \$form->textField(\$model,'{$column->name}',
								array(	'id'=>'{$column->name}',
										'class'=>'form-control',
										'placeholder'=>'Enter {$column->name}')); ?>\n"; ?>
		  	</div>
	</div>
<?php endforeach; ?>
	<div class="col-md-10 col-md-offset-1">
	  <div class="col-md-6 col-md-offset-3 ">
		  	<?php echo "<?php echo CHtml::submitButton('Search',array('class'=>'btn-small btn-color btn-pad')); ?>\n"; ?>
	  </div>
	</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- search-form -->