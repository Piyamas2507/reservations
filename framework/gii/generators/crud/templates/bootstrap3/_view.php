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

<div class="col-sm-6">
<div class="panel panel-default">
	<div class="panel-heading">
	<?php
	echo "<?php echo CHtml::encode(\$data->getAttributeLabel('{$this->tableSchema->primaryKey}')); ?>:";

	echo "<?php echo CHtml::link(CHtml::encode(\$data->{$this->tableSchema->primaryKey}), array('view', 'id'=>\$data->{$this->tableSchema->primaryKey})); ?>";
	
	echo "<?php echo CHtml::link(CHtml::encode(''), array('update', 'id'=>\$data->{$this->tableSchema->primaryKey}),array('class'=>'fa fa-pencil fa-fw pull-right',
						'rel'=>'tooltip',
						'data-toggle'=>'tooltip',
		            	'data-placement'=>'top',
		            	'data-original-title'=>'Update')); ?>";	

	echo "<?php echo CHtml::link(CHtml::encode(''), array('view', 'id'=>\$data->{$this->tableSchema->primaryKey}),array('class'=>'fa fa-eye fa-fw pull-right',
						'rel'=>'tooltip',
						'data-toggle'=>'tooltip',
		            	'data-placement'=>'top',
		            	'data-original-title'=>'View')); ?>";

	echo "</div>";

	echo "<div class=\"panel-body\">";
	

$count=0;
foreach($this->tableSchema->columns as $column)
{
	if($column->isPrimaryKey)
		continue;
	if(++$count==7)
		echo "\t<?php /*\n";
	echo "\t<b><?php echo CHtml::encode(\$data->getAttributeLabel('{$column->name}')); ?>:</b>\n";
	echo "\t<?php echo CHtml::encode(\$data->{$column->name}); ?>\n\t<br />\n\n";
}
if($count>=7)
	echo "\t*/ ?>\n";
?>
</div>
</div>
</div>