<?php
/* @var $this ReservationsController */
/* @var $model Reservations */

$this->breadcrumbs=array(
	'Reservations'=>array('index'),
	'Manage',
);

$this->menu=array(
	// array('label'=>'ตารางการขอใช้บริการ', 'url'=>array('index')),
	array('label'=>'+ เพิ่มข้อมูลใหม่', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $('#reservations-grid').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");
?>
<div class="container">

<!-- <h2 class="headline first-child text-color"><span class="border-color">รายงาน</span></h2> -->
<div class="panel panel-default">
    <!-- <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
          รายงานคำร้องขอใช้บริการ
        </a>
      </h4>
    </div> -->
    <!-- หากต้องการให้โชว์กล่องรายงานเลย ไม่ต้องย่อไว้
    <div id="collapsetwo" class="panel-collapse collapse out" style="height: auto;"> -->
    <div id="collapseOne" class="panel-collapse collapse out" style="height: auto;">
      <div class="panel-body">
        <?php $this->renderPartial('_search',array(
            'model'=>$model,
        )); ?>      </div>
    </div>
</div>

<h2 class="headline first-child text-color"><span class="border-color">จัดการข้อมูลคำร้องขอใช้อาคารสถานที่</span></h2>
<div class="text-right container">
<span class="label label-success">อนุมัติ</span>
<span class="label label-warning">หัวหน้าอนุมัติ</span>
<span class="label label-info">รอดำเนินการ</span>
<span class="label label-danger">ไม่อนุมัติ</span>
</div>
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