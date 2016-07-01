<?php
$this->title='';
?>

<div class="container">
<?php if(Yii::app()->user->hasFlash('response')): ?>
<div class="info-board info-board-green"><?php echo Yii::t('app','Register complete.') ?></div>
    
<?php endif; ?>  
  <div class="row">
    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="sign-form">
        <h3 class="first-child"><?php echo Yii::t('app','Create New Account') ?></h3>
        <hr>
<?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'users-form',
  'enableAjaxValidation'=>false,
  'clientOptions'=>array(
    'validateOnSubmit'=>true,
  ),
  'htmlOptions'=>array('class'=>'form-horizontal',
             'role'=>'form',
             'enctype' => 'multipart/form-data'),
)); ?>          
<?php echo $form->errorSummary($model); ?>
          <div class="form-group">
            <?php echo $form->labelEx($model,'picture',array('class'=>'col-sm-4 control-label')); ?>
            <div class="col-sm-8">
                  <?php echo $form->fileField($model,'picture',array('class'=>'form-control','id'=>'uploadFile')); ?>
                <?php echo $form->error($model,'picture',array('class'=>'text-danger')); ?>
              </div>
          </div>
          <div class="form-group">
            <?php echo $form->textField($model,'display_name',
                array(  'id'=>'name',
                        'class'=>'form-control',
                        'placeholder'=>Yii::t('app','Enter your display name'),
                        'data-toggle'=>'popover',
                        'data-placement'=>'left',
                        'data-trigger'=>'focus',
                        'data-content'=>Yii::t('app','Enter your display name'),
                        'data-original-title'=>Yii::t('app','Display Name'),)); ?>
            <?php echo $form->error($model,'display_name',array('class'=>'text-danger')); ?>
          </div>
          <div class="form-group">
            <?php $this->widget('CMaskedTextField',array(
                  'model'=>$model,
                  'attribute'=>'telephone',
                  'name'=>'telephone',
                  'mask'=>'(999)999-9999',
                  'htmlOptions'=>array(
                      'class'=>'form-control',
                      'placeholder'=>Yii::t('app','Enter your telephone number'),
                      'data-toggle'=>'popover',
                      'data-placement'=>'left',
                      'data-trigger'=>'focus',
                      'data-content'=>Yii::t('app','Enter your telephone number'),
                      'data-original-title'=>'Telephone',
                  )));?>
            <?php echo $form->error($model,'telephone',array('class'=>'text-danger')); ?>
          </div>
          <div class="form-group">
            <?php echo $form->textField($model,'email',
                array(  'id'=>'email',
                        'class'=>'form-control',
                        'placeholder'=>Yii::t('app','Enter a valid email here.'),
                        'data-toggle'=>'popover',
                        'data-placement'=>'left',
                        'data-trigger'=>'focus',
                        'data-content'=>Yii::t('app','Enter a valid email here.'),
                        'data-original-title'=>'Email',)); ?>
            <?php echo $form->error($model,'email',array('class'=>'text-danger')); ?>
          </div>
          <div class="form-group">
            <?php echo $form->textField($model,'username',
                array(  'id'=>'username',
                        'class'=>'form-control',
                        'placeholder'=>Yii::t('app','Enter your username.'),
                        'data-toggle'=>'popover',
                        'data-placement'=>'left',
                        'data-trigger'=>'focus',
                        'data-content'=>Yii::t('app','Enter your username.'),
                        'data-original-title'=>'Username',
                        'autocomplete'=>'off',)); ?>
            <?php echo $form->error($model,'username',array('class'=>'text-danger')); ?>
          </div>
          
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <?php echo $form->passwordField($model,'password',
                array(  'id'=>'password',
                        'class'=>'form-control',
                        'placeholder'=>Yii::t('app','Enter password'),
                        'data-toggle'=>'popover',
                        'data-placement'=>'left',
                        'data-trigger'=>'focus',
                        'data-content'=>Yii::t('app','Four symbols minimum.'),
                        'data-original-title'=>'Password',
                        'autocomplete'=>'off',)); ?>
            <?php echo $form->error($model,'password',array('class'=>'text-danger')); ?>
              </div>
              <div class="col-sm-6">
                 <?php echo $form->passwordField($model,'password2',
                array(  'id'=>'repeat-password',
                        'class'=>'form-control',
                        'placeholder'=>Yii::t('app','Repeat Password'),
                        'data-toggle'=>'popover',
                        'data-placement'=>'right',
                        'data-trigger'=>'focus',
                        'data-content'=>Yii::t('app','Make sure you still remember it.'),
                        'data-original-title'=>'Repeat Password',)); ?>
            <?php echo $form->error($model,'password2',array('class'=>'text-danger')); ?>
              </div>
            </div>
          </div>
          <?php if(CCaptcha::checkRequirements()): ?>
          <div class="row"> 
            <div class="col-md-12 text-center">
                <?php $this->widget('CCaptcha'); ?>
              </div>
            <div class="form-group">
              <div class="col-sm-12">
              
              <?php echo $form->textField($model,'verifyCode',
                          array(  'id'=>'verifyCode',
                                  'class'=>'form-control',
                                  'placeholder'=>'Enter Verify Code',
                                  'data-toggle'=>'popover',
                                  'data-placement'=>'left',
                                  'data-trigger'=>'focus',
                                  'data-content'=>'Enter Verify Code',
                                  'data-original-title'=>'Verify Code',
                          )); ?>
              </div>
            </div>
            <div class="col-md-12">
              <?php echo $form->error($model,'verifyCode',array('class'=>'text-danger')); ?>
            </div>
            </div>
            <?php endif; ?>
          
          <button type="submit" class="btn btn-color"><?php echo Yii::t('app','Create Account') ?></button>
<?php $this->endWidget(); ?>
      </div>
    </div>
  </div> <!-- / .row -->
</div>