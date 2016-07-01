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
	'$label'=>array('#'),
	'Manage',
);\n";
?>

$this->menu=array(
	array('label'=>'List <?php echo $this->modelClass; ?>', 'url'=>array('index')),
	array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#<?php echo $this->class2id($this->modelClass); ?>-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
   <!-- Content -->
    <div class="container contents single">
        <div class="row">
            <div class="span9 main-wrap">
                <!-- Main Content -->
                <div class="main">
                    <div class="inner-wrapper">
					<h3 class="title">Manage <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></h3>
					<div class="row-fluid">
						<div class="alert-info alert">
				        	<button type="button" class="close" data-dismiss="alert">×</button>
							You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
							or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
				        </div>
		        		<div class="alert">
			        	<button type="button" class="close" data-dismiss="alert">×</button>
			        	<?php echo "<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>"; ?>
			        	<div class="search-form" style="display:none">
						<?php echo "<?php \$this->renderPartial('_search',array(
							'model'=>\$model,
						)); ?>\n"; ?>
						</div><!-- search-form -->
						</div>
						</div>
					</div>
				</div>	
			</div>			
	<div class="span3 sidebar-wrap">

                <?php include "_sidebar.php"; ?>

            </div>


        </div><!-- End contents row -->
        <div class="row">
        	<div class="span12">
        		<div class="main">
                    <div class="inner-wrapper">
<h3 class="title">Table</h3>
<?php echo "<?php"; ?> $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass' => 'table',
	'summaryText'=>'Displaying {start}-{end} of {count} results.',
	'template'=>'{summary} {pager} {items} {pager}',
	'columns'=>array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('style'=>'width:150px;'),
		    'template'=>'{view} {update} {delete}',
		    'buttons'=>array(
		    	'view'=>array(
		            'label'=>'',
		            'imageUrl'=>'',
		            'options'=>array(
		            	'class'=>'icon-eye-open btn btn-info',
		            	'data-toggle'=>'tooltip',
		            	'data-original-title'=>'View'
		            ),
		        ),
		        'update'=> array(
		            'label'=>'',
		            'imageUrl'=>'',
		            'options'=>array(
		            	'class'=>'icon-pencil btn btn-default',
		            	'data-toggle'=>'tooltip',
		            	'data-original-title'=>'Update'
		            ),
		        ),
		        'delete'=>array(
		            'label'=>'',
		            'imageUrl'=>'',
		            'options'=>array(
		            	'class'=>'icon-remove btn btn-danger',
		            	'data-toggle'=>'tooltip',
		            	'data-original-title'=>'Delete'
		            ),
		        ),
		    ),
		),
	),
)); ?>
				</div>
		    </div>
	    </div>
    </div>
    </div><!-- End Content -->
