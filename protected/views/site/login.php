<div class="container">
<div class="row">
  <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="sign-form">
      <h3 class="first-child"><?php echo Yii::t('app','สำหรับเจ้าหน้าที่เท่านั้น'); ?></h3>
      <hr>
      <div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
      'id'=>'login-form',
      //'enableClientValidation'=>true,
      'clientOptions'=>array(
        'validateOnSubmit'=>true,
      ),
    )); ?>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
          <?php echo $form->textField($model,'username',
                array(  'id'=>'username',
                    'class'=>'form-control',
                    'placeholder'=>'กรอกชื่อผู้ใช้(username)หรืออีเมลล์')); ?>
        </div>
        <?php echo $form->error($model,'username',array('class'=>'text-danger')); ?>
        </br>

        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
          <?php echo $form->passwordField($model,'password',
                array(  'id'=>'password',
                    'class'=>'form-control',
                    'placeholder'=>'กรอกรหัสผ่าน(password)')); ?>
        </div>
        <?php echo $form->error($model,'password',array('class'=>'text-danger')); ?>
        <div class="checkbox">
          <label>
            <?php echo $form->checkBox($model,'rememberMe'); ?> <?php echo Yii::t('app','จำรหัสผ่าน'); ?>
          </label>
        </div>
        <?php echo CHtml::submitButton('เข้าสู่ระบบ',array('class'=>'btn btn-color')); ?>
        <hr>
      <?php $this->endWidget(); ?> 
      </div>
      <div class="pwd-lost">
        <div class="pwd-lost-q show"><?php echo Yii::t('app','ลืมรหัสผ่าน'); ?> <?php echo CHtml::link(Yii::t('app','คลิกที่นี่'),array('site/recoverypassword')); ?></div>
        <div class="pwd-lost-f hidden">
          <p class="text-muted"><?php echo Yii::t('app','กรอกอีเมลล์ผู้ใช้ของคุณ เพื่อตั้งค่ารหัสผ่านใหม่'); ?></p>
          <form class="form-inline" method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/site/recoverypassword">
            <div class="form-group">
              <label class="sr-only" for="email-pwd"><?php echo Yii::t('app','Email address'); ?></label>
              <input type="email" class="form-control" name="email" id="email-pwd" placeholder="กรอกอีเมลล์">
            </div>
            <button type="submit" class="btn btn-color">ส่ง</button>
          </form>
        </div>
      </div> <!-- / .pwd-lost -->
    </div>
  </div>
</div>
</div>