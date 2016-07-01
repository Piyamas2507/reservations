<?php $this->title='รายงานอาคารสถานที่'; ?>
<div class="container">

</br>
</br>
<div class="text-right">วันที่ : <?php echo Load::DateFormat(date('d-m-Y')); ?></div>
<div class="text-center">
        <img src="<?php echo Yii::app()->theme->baseUrl.'/img/logo_rmutsb.jpg'; ?>" style="height:100px;"/>
    </div>
<h5 class="text-center"><b>รายงานข้อมูลอาคารสถานที่</b></h5>
<?php
 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reservations-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'itemsCssClass' => 'table table-bordered pdf',
	'summaryText'=>'Displaying {start}-{end} of {count} results.',
	'template'=>' {pager} {items} {pager}',
	'pagerCssClass'=>'text-center col-sm-12',
	'pager' => array('header'=>'','htmlOptions'=>array('class'=>'pagination',)),
	'columns'=>array(
        array(
			'header'=>'ที่',
			'value'=>'$data->id',
		),
		array(
			'header'=>'ประเภท',
			'value'=>'Locationtypes::model()->findByPk($data->type)->name', //ค้นห้าโดยการกำหนด primarykey
			'htmlOptions'=>array('style'=>'width:50px;'),
		),
		array(
			'header'=>'บริเวณ',
			'value'=>'$data->building',
		),
		array(
			'header'=>'ขนาด',
			'value'=>'$data->size',
		),
		array(
			'header'=>'ความจุ(คน)',
			'value'=>'$data->volumn',
		),
		array(
			'header'=>'คอมฯ',
			'value'=>'$data->computer',
			'htmlOptions'=>array('style'=>'width:5px;'),
		),
		array(
			'header'=>'Projector',
			'value'=>'$data->projector',
		),
		array(
			'header'=>'Visualizer',
			'value'=>'$data->visualizer',
		),

		array(
			'header'=>'ไมค์',
			'value'=>'$data->microphone',
		),
		array(
			'header'=>'TV',
			'value'=>'$data->television',
		),
		array(
			'header'=>'แอร์',
			'value'=>'$data->air',
		),
		array(
			'header'=>'พัดลม',
			'value'=>'$data->fan',
		),
		array(
			'header'=>'อื่นๆ',
			'value'=>'$data->other',
			'htmlOptions'=>array('style'=>'width:50px;'),
		),
		array(
			'header'=>'ผู้ดูแลอาคารสถานที่',
			'value'=>'Library::Janitor($data->janitor_id)',
		),
		array(
			'header'=>'ติดต่อผู้ดูแล',
			'value'=>'($data->janitor_id)? Janitors::model()->findByPk($data->janitor_id)->phone : "-";',
		),
	),
)); ?>
</div>