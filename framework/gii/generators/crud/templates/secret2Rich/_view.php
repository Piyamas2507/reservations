<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $data <?php echo $this->getModelClass(); ?> */
?>
<div class="col2 border-hover">
<?php echo "<?php"; ?> $this->widget('zii.widgets.CDetailView', array(
	'data'=>$data,
	'htmlOptions'=>array('class'=>'def-table striped tiny hover'),
	'attributes'=>array(
<?php
foreach($this->tableSchema->columns as $column)
	echo "\t\t'".$column->name."',\n";
?>
	),
)); ?>
</div>