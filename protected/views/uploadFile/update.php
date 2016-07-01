<?php
/* @var $this UploadFileController */
/* @var $model UploadFile */

$this->breadcrumbs=array(
	'Upload Files'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UploadFile', 'url'=>array('index')),
	array('label'=>'Create UploadFile', 'url'=>array('create')),
	array('label'=>'View UploadFile', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UploadFile', 'url'=>array('admin')),
);
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">Update UploadFile <?php echo $model->id; ?></span></h2>

<?php if(Yii::app()->user->hasFlash('response')): ?>
<div class="info-board info-board-green">Update complete.</div>
    
<?php endif; ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<h2 class="headline first-child text-color"><span class="border-color">Manage Upload Files</span></h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'upload-file-grid',
	'dataProvider'=>$lists->search(),
	'filter'=>$lists,
	'itemsCssClass' => 'table',
	'summaryText'=>'Displaying {start}-{end} of {count} results.',
	'template'=>'{summary} {pager} {items} {pager}',
	'pagerCssClass'=>'text-center col-sm-12',
	'pager' => array('header'=>'','htmlOptions'=>array('class'=>'pagination',)),
	'columns'=>array(
		'id',
		'name',
		'url',
		'count',
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('style'=>'width:150px;'),
		    'template'=>'{view} {update} {delete}',
		    'buttons'=>array(
		    	'view'=>array(
		            'label'=>'',
		            'imageUrl'=>'',
		            //'url'=>'Yii::app()->createUrl("blog/$data->slug")',
		            'options'=>array(
		            	'class'=>'fa fa-eye btn btn-default',
		            	'rel'=>'tooltip',
		            	'data-toggle'=>'tooltip',
		            	'data-placement'=>'top',
		            	'data-original-title'=>'View'
		            ),
		        ),
		        'update'=> array(
		            'label'=>'',
		            'imageUrl'=>'',
		            'options'=>array(
		            	'class'=>'fa fa-pencil btn btn-default',
		            	'rel'=>'tooltip',
		            	'data-toggle'=>'tooltip',
		            	'data-placement'=>'top',
		            	'data-original-title'=>'Update'
		            ),
		        ),
		        'delete'=>array(
		            'label'=>'',
		            'imageUrl'=>'',
		            'options'=>array(
		            	'class'=>'fa fa-trash-o btn btn-default',
		            	'rel'=>'tooltip',
		            	'data-toggle'=>'tooltip',
		            	'data-placement'=>'top',
		            	'data-original-title'=>'Delete',
		            	
		            ),
		        ),
		    ),
		),
	),
)); ?>
</div>