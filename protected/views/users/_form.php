<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'users-form',
		'enableClientValidation'=>false,
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
		<?php echo $form->labelEx($model,'username',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'username',
								array(	'id'=>'username',
										'class'=>'form-control',
										'placeholder'=>'กรอกชื่อผู้ใช้(Username)')); ?>
		<?php echo $form->error($model,'username',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'display_name',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'display_name',
								array(	'id'=>'display_name',
										'class'=>'form-control',
										'placeholder'=>'กรอกชื่อ-นามสกุล')); ?>
		<?php echo $form->error($model,'display_name',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
	    <?php echo $form->labelEx($model,'telephone',array('class'=>'col-sm-2 control-label')); ?>
		    <div class="col-sm-10">
		    <?php $this->widget('CMaskedTextField',array(
                  'model'=>$model,
                  'attribute'=>'telephone',
                  'name'=>'telephone',
                  'mask'=>'(999)999-9999',
                  'htmlOptions'=>array(
                      'class'=>'form-control',
                      'placeholder'=>'กรอกหมายเลขโทรศัพท์',
                  )));?>
            <?php echo $form->error($model,'telephone',array('class'=>'text-danger')); ?>
		  	</div>
	  </div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'email',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'email',
								array(	'id'=>'email',
										'class'=>'form-control',
										'placeholder'=>'กรอกอีเมลล์')); ?>
		<?php echo $form->error($model,'email',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'level_user',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->dropDownList($model,'level_user',
				CHtml::listData(UsersLevel::model()->findAll(),'id','name'),
								array(	'id'=>'level_user',
										'class'=>'form-control',
										'placeholder'=>'Enter level_user')); ?>
		<?php echo $form->error($model,'level_user',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="well text-center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก',array('class'=>'btn btn-color')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->