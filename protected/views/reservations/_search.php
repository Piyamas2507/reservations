<?php
/* @var $this ReservationsController */
/* @var $model Reservations */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'htmlOptions'=>array('class'=>'form-horizontal',
						 'role'=>'form',
						 'enctype' => 'multipart/form-data'),
)); ?>

	<!-- <div class="form-group">
		<?php echo $form->labelEx($model,'id',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'id',
								array(	'id'=>'id',
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
                                      'dateFormat'=>'>=yy-mm-dd',
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
                                      'dateFormat'=>'<=yy-mm-dd',
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
								array(	''=>'ทั้งหมด',
										'0'=>'รอดำเนินการ',
										'1'=>'ไม่อนุมัติ',
										'2'=>'หัวหน้างานอนุมัติ',
										'3'=>'ผ่านการอนุมัติ',
										// '4'=>'รายงานสถิติการขอใช้',
										// '5'=>'รายงานสถิติการขอใช้',
									),
								array(	'id'=>'status',
										'class'=>'form-control',
										'placeholder'=>'Enter status')); ?>
		<?php echo $form->error($model,'status',array('class'=>'text-danger')); ?>
		</div>
	</div>


	<div class="text-center">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-color')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->