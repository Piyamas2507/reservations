<?php
/* @var $this ReservationsController */
/* @var $model Reservations */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reservations-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array('class'=>'form-horizontal',
						 'role'=>'form',
						 'enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">ช่องที่มีเครื่องหมาย <span class="required">*</span> ไม่ควรเป็นค่าว่าง</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'title',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->dropDownList($model,'title',
								array(	'นาย'=>'นาย',
										'นาง'=>'นาง',
										'นางสาว'=>'นางสาว',
									),
								array(	'id'=>'title',
										'class'=>'form-control',
										'placeholder'=>'Enter title')); ?>
		<?php echo $form->error($model,'title',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'name',
								array(	'id'=>'name',
										'class'=>'form-control',
										'placeholder'=>'กรอกชื่อ')); ?>
		<?php echo $form->error($model,'name',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'lastname',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'lastname',
								array(	'id'=>'lastname',
										'class'=>'form-control',
										'placeholder'=>'กรอกนามสกุล')); ?>
		<?php echo $form->error($model,'lastname',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'code',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php $this->widget('CMaskedTextField',array(
                  'model'=>$model,
                  'attribute'=>'code',
                  'name'=>'code',
                  'mask'=>'9-9999-99999-99-9',
                  'htmlOptions'=>array(
                      'class'=>'form-control',
                      'placeholder'=>Yii::t('app','_-____-_____-__-_'),
                  )));?>
		<?php echo $form->error($model,'code',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'location_id',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->dropDownList($model,'location_id',
				CHtml::listData(Locations::model()->findAll(),'id','name'),
								array(	'id'=>'location_id',
										'class'=>'form-control',
										'placeholder'=>'Enter location_id')); ?>
		<?php echo $form->error($model,'location_id',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'status_id',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->dropDownList($model,'status_id',
				CHtml::listData(Reservationstatus::model()->findAll(),'id','name'),
								array(	'id'=>'status_id',
										'class'=>'form-control',
										'placeholder'=>'Enter status_id')); ?>
		<?php echo $form->error($model,'status_id',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'position',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'position',
								array(	'id'=>'position',
										'class'=>'form-control',
										'placeholder'=>'กรอกตำแหน่งงาน')); ?>
		<?php echo $form->error($model,'position',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'department',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->dropDownList($model,'department',
				CHtml::listData(Departments::model()->findAll(),'id','name'),
								array(	'id'=>'department',
										'class'=>'form-control',
										'placeholder'=>'Enter department')); ?>
		<?php echo $form->error($model,'department',array('class'=>'text-danger')); ?>
		</div>
	</div>


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

        ?>

		<?php echo $form->labelEx($model,'hourstart',array('class'=>'col-sm-1 control-label')); ?>
		<div class="col-sm-2 ">
			<?php 
			$hourstart = array();
			for ($i=0; $i <= 23 ; $i++) { 
				if($i<10)
					$i='0'.$i;
				$hourstart[$i] = $i;
			}

			echo $form->dropDownList($model,'hourstart',
								$hourstart,
								array(	'id'=>'hourstart',
										'class'=>'form-control',
										'placeholder'=>'Enter hourstart')); ?>
		<?php echo $form->error($model,'hourstart',array('class'=>'text-danger')); ?>
		</div>

		<?php echo $form->labelEx($model,'minstart',array('class'=>'col-sm-1 control-label')); ?>
		<div class="col-sm-2">
			<?php 
			$minstart = array();
			for ($i=00; $i <= 59 ; $i++) { 
				if($i<10)
					$i='0'.$i;
				$minstart[$i] = $i;
			} 
			echo $form->dropDownList($model,'minstart',
								$minstart,
								array(	'id'=>'minstart',
										'class'=>'form-control',
										'placeholder'=>'Enter minstart')); ?>
		<?php echo $form->error($model,'minstart',array('class'=>'text-danger')); ?>
		</div>
	</div>

		<?php 
			echo '<div class="form-group">';
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
           ?>
    <?php echo $form->labelEx($model,'hourend',array('class'=>'col-sm-1 control-label')); ?>
		<div class="col-sm-2 ">
			<?php 
			$hourend = array();
			for ($i=0; $i <= 23 ; $i++) { 
				if($i<10)
					$i='0'.$i;
				$hourend[$i] = $i;
			}

			echo $form->dropDownList($model,'hourend',
								$hourend,
								array(	'id'=>'hourend',
										'class'=>'form-control',
										'placeholder'=>'Enter hourend')); ?>
		<?php echo $form->error($model,'hourend',array('class'=>'text-danger')); ?>
		</div>

		<?php echo $form->labelEx($model,'minend',array('class'=>'col-sm-1 control-label')); ?>
		<div class="col-sm-2">
			<?php 
			$minend = array();
			for ($i=00; $i <= 59 ; $i++) { 
				if($i<10)
					$i='0'.$i;
				$minend[$i] = $i;
			} 
			echo $form->dropDownList($model,'minend',
								$minend,
								array(	'id'=>'minend',
										'class'=>'form-control',
										'placeholder'=>'Enter minend')); ?>
		<?php echo $form->error($model,'minend',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'volumn',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
		<?php 
			$volumn = array();
			for ($i=1; $i <= 999 ; $i++) { 
				$volumn[$i] = $i;
			}

			echo $form->dropDownList($model,'volumn',
								$volumn,
								array(	'id'=>'volumn',
										'class'=>'form-control',
										'placeholder'=>'Enter volumn')); ?>
		<?php echo $form->error($model,'volumn',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'detail',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'detail',
								array(	'id'=>'detail',
										'class'=>'form-control',
										'placeholder'=>'ใช้สำหรับ')); ?>
		<?php echo $form->error($model,'detail',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'comment',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'comment',
								array(	'id'=>'comment',
										'class'=>'form-control',
										'placeholder'=>'หมายเหตุ/ความต้องการเพิ่มเติม')); ?>
		<?php echo $form->error($model,'comment',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group <?php echo (Yii::app()->user->isGuest)? "hidden" :'' ; ?>">
		<?php echo $form->labelEx($model,'status',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->dropDownList($model,'status',
								array(	'0'=>'รอดำเนินการ',
										'1'=>'ไม่อนุมัติ',
										'2'=>'หัวหน้างานอนุมัติ',
										'3'=>'ผ่านการอนุมัติ',
									),
								array(	'id'=>'status',
										'class'=>'form-control',
										'placeholder'=>'Enter status')); ?>
		<?php echo $form->error($model,'status',array('class'=>'text-danger')); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'phone',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php $this->widget('CMaskedTextField',array(
                  'model'=>$model,
                  'attribute'=>'phone',
                  'name'=>'phone',
                  'mask'=>'(999)999-9999',
                  'htmlOptions'=>array(
                      'class'=>'form-control',
                      'placeholder'=>Yii::t('app','(___)___-____'),
                  )));?>
		</div>
	</div>

	<div class="well text-center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'ยืนยันคำร้อง' : 'บันทึก',array('class'=>'btn btn-color')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->