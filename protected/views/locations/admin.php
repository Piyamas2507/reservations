<?php
/* @var $this LocationsController */
/* @var $model Locations */

$this->breadcrumbs=array(
	'Locations'=>array('index'),
	'Manage',
);

$this->menu=array(
	// array('label'=>'จัดการข้อมูลอาคารสถานที่', 'url'=>array('admin')),
	array('label'=>'+ เพิ่มข้อมูลใหม่', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#locations-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="container">

<!-- <h2 class="headline first-child text-color"><span class="border-color">รายงาน</span></h2> -->
 <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapsetwo" class="collapsed">
          <i class="fa fa-hand-o-right"></i> รายงานข้อมูลอาคารสถานที่
        </a>
      </h4>
    </div>
    <div id="collapsetwo" class="panel-collapse collapse out" style="height: auto;">

    <!-- หากต้องการให้โชว์กล่องรายงานเลย ไม่ต้องย่อไว้
    <div id="collapsetwo" class="panel-collapse collapse out" style="height: auto;"> -->

      <div class="panel-body">
        <?php $this->renderPartial('_search',array(
            'model'=>$model,
        )); ?>      </div>
    </div>
 </div>

 <h2 class="headline first-child text-color"><span class="border-color">จัดการข้อมูลอาคารสถานที่</span></h2>

<div class="table-responsive">
<?php $this->widget('zii.widgets.grid.CGridView', array(
  'id'=>'locations-grid',
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
      'htmlOptions'=>array('style'=>'width:10px;'),
    ),
    array(
      'header'=>'รูปภาพ',
      'type'=>'raw',
      'value'=>'CHtml::image(Load::Picture($data->picture),"picture",array("width"=>"50px"))',
      'htmlOptions'=>array('style'=>'width:50px;'),
    ),
    array(
      'name'=>'name',
      'htmlOptions'=>array('style'=>'width:200px;'),
    ),
    array(
      'header'=>'ประเภท',
      'value'=>'Locationtypes::model()->findByPk($data->type)->name', //ค้นห้าโดยการกำหนด primarykey
      'htmlOptions'=>array('style'=>'width:100px;'),
    ),
    array(
      'header'=>'ขนาด',
      'value'=>'($data->size);',
      'htmlOptions'=>array('style'=>'width:120px;'),
    ),
    array(
      'header'=>'ความจุ(คน)',
      'value'=>'Library::volumn($data->volumn)',
      'htmlOptions'=>array('style'=>'width:100px;'),
    ),
    array(
      'header'=>'สถานะ',
      'value'=>'($data->status)? "พร้อมใช้งาน" : "ไม่พร้อมใช้งาน" ;',
      'htmlOptions'=>array('style'=>'width:120px;'),
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