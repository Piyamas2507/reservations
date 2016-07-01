<?php $this->title='พิมพ์ใบอนุญาต'; ?>
<div class="container"> 
</br>
</br>
<div class="text-right">วันที่ : <?php echo Load::DateFormat(date('d-m-Y')); ?></div>
<?php
/* @var $this ReservationsController */
/* @var $model Reservations */

$this->breadcrumbs=array(
	'Reservations'=>array('index'),
	$model->name,
);
?>


	<div class="text-center">
    <img src="<?php echo Yii::app()->theme->baseUrl.'/img/logo_rmutsb.jpg'; ?>" style="height:100px;"/>
	</div>
	<div class="text-right">
	<h5>เลขที่ <?php echo $model->id; ?></h5>
	</div>
<h3 class="text-center">แบบฟอร์มการขอใช้อาคารสถานที่</h3>
<h4 class="text-center">งานอาคารสถานที่ มหาวิทยาลัยเทคโนโลยีราชมงคลสุวรรณภูมิ ศูนย์วาสุกรี</h4>
<h4 class="text-center">**************************</h4>

<!-- <div class="text-left">
<h5>
	สถานะ >> <?php Library::Status($model->status); ?>
</h5>
</div> -->

<h5 class="text-center">
ด้วยข้าพเจ้า <u><?php echo $model->title.' '.$model->name.' '.$model->lastname; ?></u>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
ตำแหน่ง <u><?php echo $model->position ?></u>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
หน่วยงาน <u><?php if (Departments::model()->findByPk($model->department)){
										  $department = Departments::model()->findByPk($model->department);
										  echo $department->name; }
										  ?></u>
</h5>
<h5>
เบอร์โทรศัพท์ติดต่อ <u><?php echo $model->phone; ?></u>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
วันที่ใช้บริการ <u><?php echo Load::DateFormat($model->datestart).' - '.Load::DateFormat($model->datestart); ?></u>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
สถานที่ <u><?php if (Locations::model()->findByPk($model->location_id)){
										  $location_id = Locations::model()->findByPk($model->location_id);
										  echo $location_id->name; }
										  ?></u>
</h5>
<h5>
วัตถุประสงค์ <u><?php echo $model->detail; ?></u>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
จำนวนผู้เข้าใช้บริการ <u><?php echo $model->volumn; ?></u> คน
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
หมายเหตุ/ความต้องการเพิ่มเติม <u><?php echo $model->comment; ?></u>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</h5>

<h5>อื่นๆ .................................................................................................................................................................................................................</h5>
<h5 class="text-center">ลงชื่อ.............................................................ผู้ขอใช้บริการ</h5>
<h5 class="text-center">( <?php echo $model->title.' '.$model->name.' '.$model->lastname; ?> )</h5>
<!-- <h5 class="text-center">วัน/เวลาที่ยื่นคำร้องขอใช้บริการ <u><?php echo $model->create; ?></u></h5> -->
<h5>เรียน หัวหน้างานบริการ ผ่าน งานอาคารสถานที่ เพื่อพิจารณาอนุญาต</h5>
<h5 class="text-center">ลงชื่อ.............................................................</h5>
<h5 class="text-center">(..........................................................)</h5>
<h5 class="text-center">ผู้รับคำร้องขอใช้บริการงานอาคารสถานที่</h5>
<h5>เห็นควรอนุญาต</h5>
<h5 class="text-center">ลงชื่อ.............................................................</h5>
<h5 class="text-center">(<?php echo Users::model()->find('level_user=2')->display_name?>)</h5>
<h5 class="text-center">หัวหน้างานอาคารสถานที่</h5>

<h5>อนุญาต</h5>
<h5 class="text-center">ลงชื่อ.............................................................</h5>
<h5 class="text-center">(<?php echo Users::model()->find('level_user=3')->display_name?>)</h5>
<h5 class="text-center">หัวหน้างานบริการ</h5>

<h5><u>หมายเหตุ</u>&nbsp;&nbsp;ผู้ขอใช้อาคารสถานที่ต้องรับผิดชอบทุกๆ กรณีในความเสียหายต่อทรัพย์สินของทางราชการ
และแจ้งแม่บ้านให้ปิดห้องเมื่อเสร็จภารกิจทุกครั้ง(กรุณาเขียนลักษณะการจัดห้องที่ต้องการอยู่ด้านหลัง)
</h5>




<!--<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>'table table-hover table-condensed'),
	'attributes'=>array(
		'id',
		'title',
		'name',
		'lastname',
		'code',
		'phone',
		'status_id',
		'position',
		'department',
		'create',
		'location_id',
		'datestart',
		'dateend',
		'timestart',
		'timeend',
		'volumn',
		'detail',
		'comment',
	),
)); 
?>-->
</div>