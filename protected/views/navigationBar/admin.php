<?php
/* @var $this NavigationBarController */
/* @var $model NavigationBar */

$this->breadcrumbs=array(
	'Navigation Bars'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'+ สร้างเมนู', 'url'=>array('create')),
);
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">จัดการเมนู</span></h2>

<div class="table-responsive">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'navigation-bar-grid',
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
			'header' => 'icon',
			'value' => 'NavigationBar::Icon($data->icon)',
		),
		array(
			'name'=>'dropdown',
			'value'=>'NavigationBar::Name($data->dropdown)',
		),
		'url',
		array(
			'header'=>'swap',
			'type'=>'raw',
			'value'=>'NavigationBar::Swap($data->id)',
			'htmlOptions'=>array('style'=>'width:100px;'),
		),

		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('style'=>'width:150px;'),
		    'template'=>'{update} {delete}',
		    'buttons'=>array(
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