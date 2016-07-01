<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

<?php
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'Home'=>array('page/index'),
	'$label'=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(
	array('label'=>'List <?php echo $this->modelClass; ?>', 'url'=>array('index')),
	array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')),
	array('label'=>'Update <?php echo $this->modelClass; ?>', 'url'=>array('update', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	array('label'=>'Delete <?php echo $this->modelClass; ?>', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
);
?>
<div class="content">
<div class="container">
<div class="row">
	<div class="col-md-9 col-xs-9">
		<h3 class="title">View • <?php echo $this->modelClass." #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h3>
		<?php echo "<?php"; ?> $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
		<?php
		foreach($this->tableSchema->columns as $column)
			echo "\t\t'".$column->name."',\n";
		?>
			),
		)); ?>
	</div>
	<div class="col-md-3 col-xs-3">
		<div class="widget">
		<?php echo"<?php include('_sidebar.php'); ?>\n"; ?>
		</div>
	</div>
</div>
</div>
</div>
<div class="divider"></div>


