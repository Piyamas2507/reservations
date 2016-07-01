<?php
/* @var $this LocationsController */
/* @var $model Locations */

$this->breadcrumbs=array(
	'Locations'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
	array('label'=>'+ เพิ่มข้อมูลใหม่', 'url'=>array('create')),
	array('label'=>'แก้ไข', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'ลบ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'คุณต้องการลบข้อมูล?')),
);
?>

<div class="container">

	<h3 class="headline first-child text-color"><span class="border-color">รายละเอียดและปฎิธินการใช้งาน : <?php echo $model->name; ?></span></h3>
	<div class="text-center">
		<div class="col-sm-12">
			<a href = "<?php echo Yii::app()->request->baseUrl.$model->picture; ?>" rel="lightbox">
				<img src="<?php echo Yii::app()->request->baseUrl.$model->picture; ?>" style="height:150px; margin-right:20px;" class="img-thumbnail" alt="Responsive image">
			</a>
			<?php  $result=locationsgallery::model()->findAll('location_id='.$model->id);
			foreach ($result as $key => $value) {
				echo '<a href = "'.Yii::app()->request->baseUrl.$value['picture'].'" rel="lightbox">
				<img src="'.Yii::app()->request->baseUrl.$value['picture'].'" style="height:150px;  margin-right:20px;" class="img-thumbnail" alt="Responsive image">
				</a>';
			}?>	
		</div>
		.....
	</div>
	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
			</div>
				<div class="panel-body">	
				<dl class="dl-horizontal">
				  <dt>สถานะ</dt><dd><?php Library::locationstatus($model->status); ?></dd>
				  <dt>ชื่ออาคารสถานที่</dt><dd><?php echo $model->name; ?></dd>
				  <dt>ประเภท</dt><dd><?php if (Locationtypes::model()->findByPk($model->type)){
													  $type = Locationtypes::model()->findByPk($model->type);
													  echo $type->name; }
													  ?></dd>
				  <dt>สถานที่ตั้ง</dt><dd><?php echo $model->building; ?></dd>
				  <dt>ขนาด</dt><dd><?php echo $model->size; ?></dd>
				  <dt>จำนวนที่รองรับ</dt><dd><?php echo $model->volumn; ?> คน</dd>
				  <dt>ผู้ดูแลอาคารสถานที่</dt><dd><?php if (Janitors::model()->findByPk($model->janitor_id)){
													  $janitor = Janitors::model()->findByPk($model->janitor_id);
													  echo $janitor->title.' '.$janitor->name.' '.$janitor->lastname; }
													  ?></dd>
				  <dt>ติดต่อผู้ดูแล</dt><dd><?php if (Janitors::model()->findByPk($model->janitor_id)){
													  $janitor = Janitors::model()->findByPk($model->janitor_id);
													  echo $janitor->phone; }
													  ?></dd>
				</dl>
		</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
			</div>
				<div class="panel-body">	
				<dl class="dl-horizontal">
				  <dt>อุปกรณ์</dt><dd>(สิ่งอำนวยความสะดวก)</dd>
				  	<dt>จำนวนคอมพิวเตอร์</dt><dd><?php echo $model->computer; ?> เครื่อง</dd>
				  	<dt>จำนวนโปรเจคเตอร์</dt><dd><?php echo $model->projector; ?> เครื่อง</dd>
					<dt>จำนวนเครื่องฉายภาพ</dt><dd> <?php echo $model->visualizer; ?> เครื่อง</dd>
					<dt>จำนวนไมโครโฟน</dt><dd><?php echo $model->microphone; ?> เครื่อง</dd>
					<dt>จำนวนโทรทัศน์</dt><dd><?php echo $model->television; ?> เครื่อง</dd>
					<dt>จำนวนแอร์</dt><dd><?php echo $model->air; ?> เครื่อง</dd>
					<dt>จำนวนพัดลม</dt><dd><?php echo $model->fan; ?> เครื่อง</dd>
				</dl>
		</div>
		</div>
	</div>
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			</div>
				<div class="panel-body">	
				<dl class="dl-horizontal">
				  <h5 class="text-center"><b>ข้อมูลอื่นๆ</b> <?php echo $model->other; ?></h5>
				</dl>
		</div>
		</div>
	</div>
	

<!-- เรียกข้อมูลทั้งหมด -->	
<!-- 
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>'table table-hover table-condensed'),
	'attributes'=>array(
		'id',
		'name',
		'type',
		// '(Locationtypes::model()->findAll(),'id','name')'
		'building',
		'size',
		'volumn',
		'computer',
		'projector',
		'visualizer',
		'microphone',
		'television',
		'air',
		'fan',
		'other',
	),
)); ?>
 -->
 <!-- เรียกข้อมูลทั้งหมด -->
<div class="table-responsive">
<?php 

$this->widget('ext.EFullCalendar.EFullCalendar', array(
    // polish version available, uncomment to use it
    'lang'=>'th',
    // you can create your own translation by copying locale/pl.php
    // and customizing it
 
    // remove to use without theme
    // this is relative path to:
    // themes/<path>
    //'themeCssFile'=>'cupertino/theme.css',
 
    // raw html tags
    'htmlOptions'=>array(
        // you can scale it down as well, try 80%
        'style'=>'width:100%'
    ),
    // FullCalendar's options.
    // Documentation available at
    // http://arshaw.com/fullcalendar/docs/
    'options'=>array(
        'header'=>array(
            'left'=>'prev,next',
            'center'=>'title',
            // 'right'=>'today'
            'right'=>'today,month,agendaWeek,agendaDay'
        ),
        'lazyFetching'=>true,
        'events'=>Yii::app()->request->baseUrl.'/site/Calendarid?id='.$model->id, // action URL for dynamic events, or
 
        // event handling
        // mouseover for example
        //'eventMouseover'=>new CJavaScriptExpression("js_function_callback"),
    )
));

?>

</br>
</br>
</br>
</div>
</br>
<div class="text-center">
<a href="<?php echo Yii::app()->request->baseUrl; ?>/reservations/create" class="btn btn-primary btn-md" role="button" style="color:#fff;"><i class="fa fa-plus-square"></i> ยื่นคำร้องขอใช้บริการ</a>
</div>
</br>
</div>
