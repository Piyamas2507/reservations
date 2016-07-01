<?php
/* @var $this LocationsController */
/* @var $model Locations */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'locations-form',
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

	<?php 	if(!empty($model->picture)): echo '
	<div class="form-group">
	<div class="col-md-6 col-md-offset-4 ">
	<img src="'.Yii::app()->request->baseUrl.$model->picture.'" style="height:100px;">
	</div></div>';
			else :echo '<div class="form-group">
	<div class="col-md-6 col-md-offset-4 ">no image</div></div>';
			endif; ?>

	<div class="form-group">

		<?php echo $form->labelEx($model,'picture',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
	    		<?php echo $form->fileField($model,'picture',array('class'=>'form-control','id'=>'uploadFile')); ?>
	    	<?php echo $form->error($model,'picture',array('class'=>'text-danger')); ?>
	    </div>
	</div>


	<div class="form-group">
		<?php echo $form->labelEx($model,'name',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'name',
								array(	'id'=>'name',
										'class'=>'form-control',
										'placeholder'=>'กรอกชื่ออาคารสถานที่')); ?>
		<?php echo $form->error($model,'name',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'type',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->dropDownList($model,'type',
				CHtml::listData(Locationtypes::model()->findAll(),'id','name'),
								array(	'id'=>'type',
										'class'=>'form-control',
										'placeholder'=>'Enter type')); ?>
		<?php echo $form->error($model,'type',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'building',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'building',
								array(	'id'=>'building',
										'class'=>'form-control',
										'placeholder'=>'กรอกรายละเอียดที่ตั้ง/อาคาร')); ?>
		<?php echo $form->error($model,'building',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'size',array('class'=>'col-sm-2 col-xs-12 control-label')); ?>
		<div class="col-sm-3 col-xs-10">
			<?php echo $form->textField($model,'size',
								array(	'id'=>'size',
										'class'=>'form-control',
										'placeholder'=>'ระบุขนาด (ตัวอย่าง 4x5 เมตร)')); ?>
		<?php echo $form->error($model,'size',array('class'=>'text-danger')); ?>
		</div>
		<label class="col-sm-1 col-xs-2 control-label required" for="Locations_size">เมตร </label>

		<?php echo $form->labelEx($model,'volumn',array('class'=>'col-sm-2 col-xs-12 control-label')); ?>
		<div class="col-sm-3 col-xs-10">
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
		<label class="col-sm-1 col-xs-2  control-label required" for="Locations_volumn">คน </label>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'computer',array('class'=>'col-sm-2 col-xs-12 control-label')); ?>
		<div class="col-sm-3 col-xs-10 ">
			<?php 
			$com = array();
			for ($i=0; $i <= 99 ; $i++) { 
				$com[$i] = $i;
			}

			echo $form->dropDownList($model,'computer',
								$com,
								array(	'id'=>'computer',
										'class'=>'form-control',
										'placeholder'=>'Enter computer')); ?>
		<?php echo $form->error($model,'computer',array('class'=>'text-danger')); ?>
		</div>
		<label class="col-sm-1 col-xs-2 control-label required" for="Locations_computer">เครื่อง </label>

		<?php echo $form->labelEx($model,'projector',array('class'=>'col-sm-2 col-xs-12 control-label')); ?>
		<div class="col-sm-3 col-xs-10">
			<?php 
			$projector = array();
			for ($i=0; $i <= 10 ; $i++) { 
				$projector[$i] = $i;
			} 
			echo $form->dropDownList($model,'projector',
								$projector,
								array(	'id'=>'projector',
										'class'=>'form-control',
										'placeholder'=>'Enter projector')); ?>
		<?php echo $form->error($model,'projector',array('class'=>'text-danger')); ?>
		</div>
		<label class="col-sm-1 col-xs-2 control-label required" for="Locations_projector">ตัว </label>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'visualizer',array('class'=>'col-sm-2 col-xs-12 control-label')); ?>
		<div class="col-sm-3 col-xs-10">
			<?php 
			$visualizer = array();
			for ($i=0; $i <= 5 ; $i++) { 
				$visualizer[$i] = $i;
			} 
			echo $form->dropDownList($model,'visualizer',
								$visualizer,
								array(	'id'=>'visualizer',
										'class'=>'form-control',
										'placeholder'=>'Enter visualizer')); ?>
		<?php echo $form->error($model,'visualizer',array('class'=>'text-danger')); ?>
		</div>
		<label class="col-sm-1 col-xs-2 control-label required" for="Locations_virsualizer">ตัว </label>

		<?php echo $form->labelEx($model,'microphone',array('class'=>'col-sm-2 col-xs-12 control-label')); ?>
		<div class="col-sm-3 col-xs-10">
			<?php 
			$microphone = array();
			for ($i=0; $i <= 99 ; $i++) { 
				$microphone[$i] = $i;
			} 
			echo $form->dropDownList($model,'microphone',
								$microphone,
								array(	'id'=>'microphone',
										'class'=>'form-control',
										'placeholder'=>'Enter microphone')); ?>
		<?php echo $form->error($model,'microphone',array('class'=>'text-danger')); ?>
		</div>
		<label class="col-sm-1 col-xs-2 control-label required" for="Locations_microphone">อัน </label>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'television',array('class'=>'col-sm-2 col-xs-12 control-label')); ?>
		<div class="col-sm-3 col-xs-10 ">
			<?php 
			$television = array();
			for ($i=0; $i <= 10 ; $i++) { 
				$television[$i] = $i;
			} 
			echo $form->dropDownList($model,'television',
								$television,
								array(	'id'=>'television',
										'class'=>'form-control',
										'placeholder'=>'Enter television')); ?>
		<?php echo $form->error($model,'television',array('class'=>'text-danger')); ?>
		</div>
		<label class="col-sm-1 col-xs-2 control-label required" for="Locations_television">เครื่อง </label>

		<?php echo $form->labelEx($model,'air',array('class'=>'col-sm-2 col-xs-12 control-label')); ?>
		<div class="col-sm-3 col-xs-10 ">
			<?php 
			$air = array();
			for ($i=0; $i <= 10 ; $i++) { 
				$air[$i] = $i;
			} 
			echo $form->dropDownList($model,'air',
								$air,
								array(	'id'=>'air',
										'class'=>'form-control',
										'placeholder'=>'Enter air')); ?>
		<?php echo $form->error($model,'air',array('class'=>'text-danger')); ?>
		</div>
		<label class="col-sm-1 col-xs-2 control-label required" for="Locations_air">ตัว </label>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'fan',array('class'=>'col-sm-2 col-xs-12 control-label')); ?>
		<div class="col-sm-3 col-xs-10">
			<?php 
			$fan = array();
			for ($i=0; $i <= 20 ; $i++) { 
				$fan[$i] = $i;
			} 
			echo $form->dropDownList($model,'fan',
								$fan,
								array(	'id'=>'fan',
										'class'=>'form-control',
										'placeholder'=>'Enter fan')); ?>
		<?php echo $form->error($model,'fan',array('class'=>'text-danger')); ?>
		</div>
		<label class="col-sm-1 col-xs-2 control-label required" for="Locations_fan">ตัว </label>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'other',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textArea($model,'other',
								array(	'id'=>'other',
										'class'=>'form-control',
										'placeholder'=>'หมายเหตุ')); ?>
		<?php echo $form->error($model,'other',array('class'=>'text-danger')); ?>
		</div>
	</div>
<?php 
	$data = Janitors::model()->findAll();

	foreach ($data as $key => $value) {
		$result[$value->id] = $value->title.' '.$value->name.' '.$value->lastname;
	}
?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'janitor_id',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->dropDownList($model,'janitor_id',
				$result,
								array(	'id'=>'janitor_id',
										'class'=>'form-control',
										'placeholder'=>'Enter janitor_id')); ?>
		<?php echo $form->error($model,'janitor_id',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'status',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->dropDownList($model,'status',
								array(	'1'=>'พร้อมใช้งาน',
										'0'=>'ไม่พร้อมใช้งาน',
									),
								array(	'id'=>'status',
										'class'=>'form-control',
										'placeholder'=>'Enter status')); ?>
		<?php echo $form->error($model,'status',array('class'=>'text-danger')); ?>
		</div>
	</div>


	<div class="well text-center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก',array('class'=>'btn btn-color')); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->