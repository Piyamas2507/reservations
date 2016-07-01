<?php

$this->menu=array(
	// array('label'=>'List Departments', 'url'=>array('index')),
	array('label'=>'+ เพิ่มข้อมูลใหม่', 'url'=>array('create')),
);

?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">จัดการข้อมูลหน่วยงานภายใน</span></h2>
<?php if(Yii::app()->user->hasFlash('response')): ?>
<div class="info-board info-board-green">เพิ่มข้อมูลสำเร็จ</div>
   <!--  Update alert -->
<?php endif; ?>


<div class="table-responsive">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'departments-grid',
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
		'name',
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