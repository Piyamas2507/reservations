<?php
/* @var $this LocationsgalleryController */
/* @var $model Locationsgallery */

$this->breadcrumbs=array(
	'Locationsgalleries'=>array('index'),
	'Manage',
);

$this->menu=array(
	// array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
	array('label'=>'+ เพิ่มรูปภาพใหม่', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#locationsgallery-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">จัดการข้อมูลรูปภาพอาคารสถานที่</span></h2>


<div class="table-responsive">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'locationsgallery-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass' => 'table',
	'summaryText'=>'Displaying {start}-{end} of {count} results.',
	'template'=>'{summary} {pager} {items} {pager}',
	'pagerCssClass'=>'text-center col-sm-12',
	'pager' => array('header'=>'','htmlOptions'=>array('class'=>'pagination',)),
	'columns'=>array(
		array(
		      'name'=>'id',
		      'htmlOptions'=>array('style'=>'width:50px;'),
		    ),
		'picture',
		 array(
      'header'=>'อาคารสถานที่',
      'value'=>'Locations::model()->findByPk($data->location_id)->name', //ค้นห้าโดยการกำหนด primarykey
      'htmlOptions'=>array('style'=>'width:200px;'),
    ),
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
		            	'data-original-title'=>'เรียกดู'
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
		            	'data-original-title'=>'แก้ไข'
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
		            	'data-original-title'=>'ลบ',
		            	
		            ),
		        ),
		    ),
		),
	),
)); ?>
</div>
</div>