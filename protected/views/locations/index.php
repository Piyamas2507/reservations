<?php
/* @var $this LocationsController */
/* @var $model Locations */

$this->breadcrumbs=array(
	'Locations'=>array('index'),
	'Manage',
);

// $this->menu=array(
// 	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
// 	array('label'=>'+ เพิ่มข้อมูลใหม่', 'url'=>array('create')),
// );

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#locations-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->menu=array(
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
	array('label'=>'+ เพิ่มข้อมูลใหม่', 'url'=>array('create')),
);
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">ตารางข้อมูลอาคารสถานที่</span></h2>

<a href="<?php echo Yii::app()->request->baseUrl; ?>/reservations/create" class="btn btn-primary btn-md" role="button" style="color:#fff;"><i class="fa fa-plus-square"></i> ยื่นคำร้องขอใช้บริการ</a>

<div class="table-responsive">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'locations-grid',
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
			'htmlOptions'=>array('style'=>'width:10px;'),
		),
		array(
			'header'=>'รูปภาพ',
			'type'=>'raw',
			'value'=>'CHtml::image(Load::Picture($data->picture),"picture",array("width"=>"50px"))',
			'htmlOptions'=>array('style'=>'width:50px;'),
		),
		array(
			'name'=>'name',
			'htmlOptions'=>array('style'=>'width:200px;'),
		),
		array(
			'header'=>'ประเภท',
			'value'=>'Locationtypes::model()->findByPk($data->type)->name', //ค้นห้าโดยการกำหนด primarykey
			'htmlOptions'=>array('style'=>'width:100px;'),
		),
		array(
			'header'=>'ขนาด',
			'value'=>'($data->size);',
			'htmlOptions'=>array('style'=>'width:120px;'),
		),
		array(
			'header'=>'ความจุ(คน)',
			'value'=>'Library::volumn($data->volumn)',
			'htmlOptions'=>array('style'=>'width:100px;'),
		),
		array(
			'header'=>'สถานะ',
			'value'=>'($data->status)? "พร้อมใช้งาน" : "ไม่พร้อมใช้งาน" ;',
			'htmlOptions'=>array('style'=>'width:120px;'),
		),

		
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('style'=>'width:150px;'),
		    'template'=>'{view}',
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
</div>