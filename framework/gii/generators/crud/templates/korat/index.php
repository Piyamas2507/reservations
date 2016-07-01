<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $dataProvider CActiveDataProvider */

<?php
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'Home'=>'page/index',
	'$label',
);\n";
?>

$this->menu=array(
	array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')),
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
		<?php echo "<?php"; ?> $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		)); ?>
		 </div>
            </div><!-- End Main Content -->

        </div> <!-- End span9 -->

        <div class="span3 sidebar-wrap">

            <?php include "_sidebar.php"; ?>

        </div>


    </div><!-- End contents row -->

</div><!-- End Content -->
