<?php
/* @var $this ReservationsController */
/* @var $model Reservations */

$this->breadcrumbs=array(
	'Reservations'=>array('index'),
	'Manage',
);

// $this->menu=array(
// 	array('label'=>'ตารางการขอใช้บริการ', 'url'=>array('index')),
// 	array('label'=>'เพิ่มข้อมูลการใช้บริการ', 'url'=>array('create')),
// );
$this->menu=array(
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
	// array('label'=>'สถิตการใช้อาคารสถานที่', 'url'=>array('graph')),
);
?>
<div class="container">
<a href="<?php echo Yii::app()->request->baseUrl; ?>/reservations/create" class="btn btn-primary btn-md" role="button" style="color:#fff;"><i class="fa fa-plus-square"></i> ยื่นคำร้องขอใช้บริการ</a>
</div>

<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">คำร้องขอใช้บริการ</span></h2>
<!-- <div class="text-left"> -->
<!-- <span class="label label-default">Default</span> -->
<!-- <span class="label label-primary">Primary</span> -->
<!-- </div> -->

<span class="label label-success">อนุมัติ</span>
<span class="label label-warning">หัวหน้างานอนุมัติ</span>
<span class="label label-info">รอดำเนินการ</span>
<span class="label label-danger">ไม่อนุมัติ</span>

</br>
</br>
<div class="table-responsive">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reservations-grid',
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
		array(
			'name'=>'title',
			'htmlOptions'=>array('style'=>'width:100px;'),
		),
		array(
			'name'=>'name',
			'htmlOptions'=>array('style'=>'width:100px;'),
		),
		array(
			'name'=>'lastname',
			'htmlOptions'=>array('style'=>'width:100px;'),
		),

		array(
			'value'=>'Library::Detail($data->id)',
		),
		array(
			'header'=>'สถานะ',
			'type'=>'raw',
			'value'=>'Library::Status($data->status)',
			'htmlOptions'=>array('style'=>'width:50px;'),
		),
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('style'=>'width:50px;'),
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
