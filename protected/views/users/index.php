<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'รายการผู้ใช้ทั้งหมด', 'url'=>array('index')),
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
	array('label'=>'+ เพิ่มข้อมูลใหม่', 'url'=>array('create')),
);
?>
<div class="container">
	
	<div class="row">
	<div class="col-md-6">
	<h3 class="headline first-child text-color"><span class="border-color">จำนวนผู้ใช้ทั้งหมด : <?php echo Load::MemberTotal(); ?> คน</span></h3>
	</div>
	<div class="col-md-6" style="margin-top:20px;">
      <form class="form" role="search" method="get" action="<?php echo Yii::app()->request->baseUrl; ?>/users">
        <!-- <div class="input-group">
          <input type="text" name="search" class="form-control" placeholder="Search for Users">
          <span class="input-group-btn">
            <button class="btn btn-color" type="button">Go!</button>
          </span>
        </div> -->
      </form>
    </div>
	
</div>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'template'=>"{pager}\n{items}\n{pager}",
	'pagerCssClass'=>'text-center col-sm-12',
	'pager' => array('header'=>'','htmlOptions'=>array('class'=>'pagination',)),
	'itemView'=>'_view',
)); ?>
<!-- <ปุ่มย้นกลับ> -->
<div class="text-center">
<button onclick="goBack()" class="btn btn-primary btn-md" role="button" style="color:#fff;"><i class="fa fa-reply"></i> ย้อนกลับ</button>
<a href="<?php echo Yii::app()->request->baseUrl; ?>/site/index" class="btn btn-warning btn-md" role="button" style="color:#fff;"><i class="fa fa-home"></i> กลับสู่หน้าหลัก</a>

<script>
function goBack() {
    window.history.back()
}
</script>
</div>
<!-- <ปุ่มย้นกลับ> -->
</div>