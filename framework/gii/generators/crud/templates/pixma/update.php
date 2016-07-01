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
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	'Update',
);\n";
?>

$this->menu=array(
	array('label'=>'List <?php echo $this->modelClass; ?>', 'url'=>array('index')),
	array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')),
	array('label'=>'View <?php echo $this->modelClass; ?>', 'url'=>array('view', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	array('label'=>'Manage <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
);
?>
<div class="content">
<div class="container">
<div class="row">
	<div class="col-md-9 col-xs-9">
		<h3 class="title"><?php echo $this->modelClass." <?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h3>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
	        	<?php echo "<?php \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>			</div>
		</div>
	</div>
	<div class="col-md-3 col-xs-3">
		<div class="widget">
		<?php echo"<?php include('_sidebar.php'); ?>\n"; ?>
		</div>
	</div>
</div>
</div>
</div>