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

<?php echo "<?php \$form=\$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl(\$this->route),
	'type'=>'horizontal',
	'method'=>'get',
)); ?>\n"; ?>

<?php foreach($this->tableSchema->columns as $column): ?>
<?php
	$field=$this->generateInputField($this->modelClass,$column);
	if(strpos($field,'password')!==false)
		continue;
?>
	<?php echo "<?php echo \$form->textFieldRow(\$model,'{$column->name}'); ?>\n"; ?>

<?php endforeach; ?>

	<?php echo "<?php echo CHtml::submitButton('Search',array('class'=>'btn')); ?>\n"; ?>


<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- search-form -->