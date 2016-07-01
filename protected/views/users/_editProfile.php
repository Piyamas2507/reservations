<h4 class="primary-font">แก้ไขข้อมูลส่วนตัว</h4>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'updateProfile-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array('class'=>'form-horizontal',
						 'role'=>'form',
						 'enctype' => 'multipart/form-data'),
)); ?>
	  <?php 	if(!empty($model->picture)): echo '
	<div class="form-group">
	<div class="col-md-6 col-md-offset-4 ">
	<img src="'.Yii::app()->request->baseUrl.$model->picture.'" style="height:100px;">
	</div></div>';
			else :echo '<div class="form-group">
	<div class="col-md-6 col-md-offset-4 ">no image</div></div>';
			endif; ?>

	<div class="form-group">

		<?php echo $form->labelEx($model,'picture',array('class'=>'col-sm-4 control-label')); ?>
		<div class="col-sm-8">
	    		<?php echo $form->fileField($model,'picture',array('class'=>'form-control','id'=>'uploadFile')); ?>
	    	<?php echo $form->error($model,'picture',array('class'=>'text-danger')); ?>
	    </div>
	</div>
	  <div class="form-group">
	    <?php echo $form->labelEx($model,'display_name',array('class'=>'col-sm-4 control-label')); ?>
		    <div class="col-sm-8">
		    <?php echo $form->textField($model,'display_name',
									array(	'id'=>'display_name',
											'class'=>'form-control',
											'placeholder'=>'Enter Display Name')); ?>
			<?php echo $form->error($model,'display_name',array('class'=>'text-danger')); ?>
		  	</div>
	  </div>

	  <div class="form-group">
	    <?php echo $form->labelEx($model,'username',array('class'=>'col-sm-4 control-label')); ?>
		    <div class="col-sm-8">
		    <?php echo $form->textField($model,'username',
									array(	'id'=>'username',
											'class'=>'form-control',
											'placeholder'=>'Enter New Username')); ?>
			<?php echo $form->error($model,'username',array('class'=>'text-danger')); ?>
		  	</div>
	  </div>

	  <div class="form-group">
	    <?php echo $form->labelEx($model,'email',array('class'=>'col-sm-4 control-label')); ?>
		    <div class="col-sm-8">
		    <?php echo $form->textField($model,'email',
									array(	'id'=>'email',
											'class'=>'form-control',
											'placeholder'=>'Confirm Password')); ?>
			<?php echo $form->error($model,'email',array('class'=>'text-danger')); ?>
		  	</div>
	  </div>

	  <div class="form-group">
	    <?php echo $form->labelEx($model,'telephone',array('class'=>'col-sm-4 control-label')); ?>
		    <div class="col-sm-8">
		    <?php $this->widget('CMaskedTextField',array(
                  'model'=>$model,
                  'attribute'=>'telephone',
                  'name'=>'telephone',
                  'mask'=>'(999)999-9999',
                  'htmlOptions'=>array(
                      'class'=>'form-control',
                      'placeholder'=>'Enter your telephone number',
                  )));?>
            <?php echo $form->error($model,'telephone',array('class'=>'text-danger')); ?>
		  	</div>
	  </div>

		<div class="well text-center">
			  	<?php echo CHtml::submitButton('บันทึก',array('class'=>'btn btn-sm btn-color')); ?>
		</div>
<?php $this->endWidget(); ?>
</div>