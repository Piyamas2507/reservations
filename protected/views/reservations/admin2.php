<?php
/* @var $this ReservationsController */
/* @var $model Reservations */

$this->breadcrumbs=array(
	'Reservations'=>array('index'),
	'Manage',
);

$this->menu=array(
	// array('label'=>'ตารางการขอใช้บริการ', 'url'=>array('index')),
	// array('label'=>'+ เพิ่มข้อมูลใหม่', 'url'=>array('create')),
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

<h3 class="headline first-child text-color"><span class="border-color">รายงาน</span></h3>
<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
          <i class="fa fa-hand-o-right"></i> คลิกเพื่อเลือกรายงานสถิติ
        </a>
      </h4>
    </div>
    <!-- หากต้องการให้โชว์กล่องรายงานเลย ไม่ต้องย่อไว้
    <div id="collapsetwo" class="panel-collapse collapse out" style="height: auto;"> -->
    <div id="collapseOne" class="panel-collapse collapse out" style="height: auto;">
      <div class="panel-body">
      
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
  'action'=>Yii::app()->createUrl($this->route),
  'method'=>'get',
  'htmlOptions'=>array('class'=>'form-horizontal',
             'role'=>'form',
             'enctype' => 'multipart/form-data',
             'target' => '_new'),//เปิดแท็ปใหม่

)); ?>

  <!-- <div class="form-group">
    <?php echo $form->labelEx($model,'id',array('class'=>'col-sm-2 control-label')); ?>
    <div class="col-sm-10">
      <?php echo $form->textField($model,'id',
                array(  'id'=>'id',
                    'class'=>'form-control',
                    'placeholder'=>'เลขที่ใบคำร้อง')); ?>
    <?php echo $form->error($model,'id',array('class'=>'text-danger')); ?>
    </div>
  </div> -->

  <?php 
            echo '<div class="form-group">';
            echo $form->labelEx($model,'datestart',array('class'=>'col-sm-2 control-label'));
            echo '<div class="col-sm-4">';
            $form->widget('zii.widgets.jui.CJuiDatePicker',
                array(
                    'attribute'=>'datestart',
                    'model'=>$model,
                    'options' => array(
                                      'mode'=>'focus',
                                      'dateFormat'=>'yy-mm-dd',
                                      'showAnim' => 'slideDown',
                                      ),
                    'htmlOptions'=>array('class'=>'form-control', 'value'=>$model->datestart),
                 )
            );
            echo '</div>';

            echo $form->labelEx($model,'dateend',array('class'=>'col-sm-2 control-label'));
            echo '<div class="col-sm-4">';
            $form->widget('zii.widgets.jui.CJuiDatePicker',
                array(
                    'attribute'=>'dateend',
                    'model'=>$model,
                    'options' => array(
                                      'mode'=>'focus',
                                      'dateFormat'=>'yy-mm-dd',
                                      'showAnim' => 'slideDown',
                                      ),
                    'htmlOptions'=>array('class'=>'form-control', 'value'=>$model->dateend),
                 )
            );
            echo '</div>';
            echo '</div>';
           ?>


  <div class="form-group">
    <?php echo $form->labelEx($model,'status',array('class'=>'col-sm-2 control-label')); ?>
    <div class="col-sm-10">
      <?php echo $form->dropDownList($model,'status',
                array(  
                    ''=>'รายงานสถิติการขอใช้บริการ',
                    'AND status = 3'=>'รายงานสถิติการใช้บริการ',
                  ),
                array(  'id'=>'status',
                    'class'=>'form-control',
                    'placeholder'=>'Enter status')); ?>
    <?php echo $form->error($model,'status',array('class'=>'text-danger')); ?>
    </div>
  </div>


  <div class="text-center">
    <?php echo CHtml::submitButton('เรียกดู',array('class'=>'btn btn-color')); ?>
  </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->  
      </div>
    </div>
</div>
</div>
<?php
$data = Locations::model()->findAll();

foreach ($data as $key => $value) {
    $location[] = Locations::model()->findByPk($value->id)->name;

    if( $reservations = Reservations::model()->findAll('location_id='.$value->id.' AND status = 3'));
    $total = 0;
    foreach ($reservations as $key => $value) {
        $total = $total + 1;
    }
    $count[] = $total;
}

?>
<div class="container text-center">
<center><h6><b><p class="bg-success"><i class="fa fa-star"></i> กราฟสถิติการให้บริการโดยรวม(อาคารสถานที่/จำนวนครั้ง) <i class="fa fa-star"></i></p></b></h6></center>

<?php 
    $this->widget(
        'chartjs.widgets.ChBars', 
        array(
            
            
            'htmlOptions' => array(),
            'labels' => $location,
            'datasets' => array(
                array(
                    "fillColor" => "rgba(220,220,220,0.5)",
                    "strokeColor" => "rgba(220,220,220,1)",
                    "data" => $count
                )       
            ),
            'options' => array(
                'scaleIntegersOnly'=>true,
                'showScale'=>true,
                'scaleFontSize'=> 18,
                'responsive'=>true,
                'scaleShowLabels'=>true,
                
                )
        )
    ); 
?>
</div>