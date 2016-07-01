<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'รายการผู้ใช้ทั้งหมด', 'url'=>array('index')),
	// array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
	array('label'=>'+ เพิ่มข้อมูลใหม่', 'url'=>array('create')),
);
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">จัดการข้อมูลผู้ใช้งานระบบ</span></h2>



<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
)); ?>
<div class="table-responsive">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass' => 'table',
	'summaryText'=>'Displaying {start}-{end} of {count} results.',
	'template'=>'{summary} {pager} {items} {pager}',
	'pagerCssClass'=>'text-center col-sm-12',
	'pager' => array('header'=>'','htmlOptions'=>array('class'=>'pagination',)),
	'columns'=>array(
		array(
            'id'=>'autoId',
            'class'=>'CCheckBoxColumn',
            'selectableRows' => '50',   
        ),
		array(
			'name'=>'id',
			'htmlOptions'=>array('style'=>'width:10px;'),
		),
		array(
			// 'name'=>'picture',
			'header'=>'รูปภาพ',
			'type'=>'raw',
			'value'=>'CHtml::image(Load::Picture($data->picture),"picture",array("width"=>"50px"))',
			'htmlOptions'=>array('style'=>'width:50px;'),
		),
		array(
			'name'=>'username',
			'htmlOptions'=>array('style'=>'width:100px;'),
		),
		array(
			'name'=>'display_name',
			'htmlOptions'=>array('style'=>'width:120px;'),
		),
		array(
			'name'=>'telephone',
			'htmlOptions'=>array('style'=>'width:150px;'),
		),
		//'password',
		array(
			'header'=>'วันที่ลงทะเบียน',
			'type'=>'raw',
			'value'=>'Library::Create_date($data->id)',
		),
		array(
			'header'=>'เข้าใช้ล่าสุด',
			'type'=>'raw',
			'value'=>'Load::TimePassed($data->last_login)',
		),
		array(
			'header'=>'สถานะ',
			'type'=>'raw',
			'value'=>'Load::UserLevel($data->level_user)',
			'htmlOptions'=>array('style'=>'width:50px;'),
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
<script>
function reloadGrid(data) {
    $.fn.yiiGridView.update('users-grid');
}
</script>
<div class="btn-group">
<!-- 
<?php echo CHtml::ajaxSubmitButton('เจ้าหน้าที่ทั่วไป',array('users/ajaxupdate','act'=>'doMember'), array('success'=>'reloadGrid'),array('class'=>'btn btn-default')); ?>
 -->
 <?php echo CHtml::ajaxSubmitButton('ผู้ดูแลระบบ',array('users/ajaxupdate','act'=>'doAdmin'), array('success'=>'reloadGrid'),array('class'=>'btn btn-success')); ?>
<?php echo CHtml::ajaxSubmitButton('หัวหน้างาน',array('users/ajaxupdate','act'=>'doVIP'), array('success'=>'reloadGrid'),array('class'=>'btn btn-warning')); ?>
<?php echo CHtml::ajaxSubmitButton('ผู้อำนวยการ',array('users/ajaxupdate','act'=>'doEditor'), array('success'=>'reloadGrid'),array('class'=>'btn btn-info')); ?>
<?php echo CHtml::ajaxSubmitButton('ลบ',array('users/ajaxupdate','act'=>'doDelete'), array('success'=>'reloadGrid'),array('class'=>'btn btn-danger')); ?>
</div>
<?php $this->endWidget(); ?>
</div>