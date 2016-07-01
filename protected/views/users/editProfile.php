<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <div class="team-member user-avatar text-center">
        <?php echo CHtml::image(Load::Picture(Yii::app()->user->detail->picture),"picture",array("class"=>"img-responsive center-block")); ?>
        <?php echo Yii::app()->user->detail->display_name; ?>
        <p class="text-muted"><?php echo Load::UserLevel(Yii::app()->user->detail->level_user); ?></p>
      </div>
      <ul class="nav nav-pills nav-stacked">
        <li><?php echo CHtml::link(Yii::t('app','ข้อมูลส่วนตัว'),array('users/profile')); ?></li>
        <li class="active"><?php echo CHtml::link(Yii::t('app','แก้ไขข้อมูลส่วนตัว'),array('users/editProfile')); ?></li>
        <li><?php echo CHtml::link(Yii::t('app','เปลี่ยนรหัสผ่าน'),array('users/changePassword')); ?></li>
        <li><?php echo CHtml::link('<i class="fa fa-sign-out"></i> '.Yii::t('app','ออกจากระบบ'),array('site/Logout')); ?></li>

      </ul>
    </div>
    <div class="col-sm-9">
      <div class="row">
          <?php $this->renderPartial('_detailProfile'); ?>
        <div class="col-sm-12">
          <hr class="arrow-down">
          <?php if(Yii::app()->user->hasFlash('response')): ?>
          <div class="info-board info-board-green">แก้ไขข้อมูลสำเร็จ.</div>
          <?php endif; ?>
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
    <?php   if(!empty($model->picture)): echo '
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
                  array(  'id'=>'display_name',
                      'class'=>'form-control',
                      'placeholder'=>'กรอกชื่อ')); ?>
      <?php echo $form->error($model,'display_name',array('class'=>'text-danger')); ?>
        </div>
    </div>

    <div class="form-group">
      <?php echo $form->labelEx($model,'username',array('class'=>'col-sm-4 control-label')); ?>
        <div class="col-sm-8">
        <?php echo $form->textField($model,'username',
                  array(  'id'=>'username',
                      'class'=>'form-control',
                      'placeholder'=>'กรอกชื่อผู้ใช้(Username)')); ?>
      <?php echo $form->error($model,'username',array('class'=>'text-danger')); ?>
        </div>
    </div>

    <div class="form-group">
      <?php echo $form->labelEx($model,'email',array('class'=>'col-sm-4 control-label')); ?>
        <div class="col-sm-8">
        <?php echo $form->textField($model,'email',
                  array(  'id'=>'email',
                      'class'=>'form-control',
                      'placeholder'=>'กรอกอีเมลล์')); ?>
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
                      'placeholder'=>'กรอกหมายเลขโทรศัพท์',
                  )));?>
            <?php echo $form->error($model,'display_name',array('class'=>'text-danger')); ?>
        </div>
    </div>

    <div class="well text-center">
          <?php echo CHtml::submitButton('บันทึก',array('class'=>'btn btn-sm btn-color')); ?>
    </div>
<?php $this->endWidget(); ?>
</div>
        </div>
      </div>
    </div>
  </div> <!-- / .row -->
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