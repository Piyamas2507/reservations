<?php
/* @var $this ReservationsController */
/* @var $data Reservations */
?>

<div class="col-sm-12">
<div class="panel panel-default">
	<div class="panel-heading">
	<?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<a href="<?php echo Yii::app()->request->baseUrl; ?>/reservations/denine/<?php echo $data->id; ?>" class="btn btn-xs btn-danger pull-right" style="color:#FFF; margin-left:20px;">ไม่อนุมัติ</a> <a href="<?php echo Yii::app()->request->baseUrl; ?>/reservations/confirm/<?php echo $data->id; ?>" class="btn btn-xs btn-success pull-right" style="color:#FFF;">อนุมัติ</a>
	</div>
	<div class="panel-body">	
	<dl class="dl-horizontal">
	  <dt>ชื่อ</dt><dd><?php echo $data->title; ?> <?php echo $data->name; ?> <?php echo $data->lastname; ?></dd>
	  <dt>ขอใช้</dt><dd><?php echo Locations::model()->findByPk($data->location_id)->name; ?></dd>
	  <dt>ในวันที่</dt><dd><?php echo Load::DateFormat($data->datestart) . ' - ' . Load::DateFormat($data->dateend);	 ?></dd>
	  <dt>ตั้งแต่เวลา</dt><dd><?php echo $data->timestart . ' - ' . $data->timeend; ?> น.</dd>
	  <dt>จำนวนคนที่ใช้</dt><dd><?php echo $data->volumn; ?> คน</dd>
	  <dt>ใช้สำหรับ</dt><dd><?php echo $data->detail; ?></dd>
	  <dt>สถานะ</dt><dd><?php echo Library::Status($data->status); ?></dd>
	</dl>

	</div>
</div>
</div>