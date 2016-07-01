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
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'Home'=>array('page/index'),
	'$label'=>array('index'),
	'Create',
);\n";
?>

$this->menu=array(
	array('label'=>'List <?php echo $this->modelClass; ?>', 'url'=>array('index')),
	array('label'=>'Manage <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
);
?>

<!-- Content -->
<div class="container contents single">
    <div class="row">
        <div class="span9 main-wrap">
            <!-- Main Content -->
            <div class="main">
                <div class="inner-wrapper">
				<h3 class="title">Create <?php echo $this->modelClass; ?></h3>
	        	<?php echo "<?php \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
				</div>
            </div><!-- End Main Content -->

        </div> <!-- End span9 -->

        <div class="span3 sidebar-wrap">

            <?php include "_sidebar.php"; ?>

        </div>
    </div>
</div>    