<?php
/* @var $this UploadFileController */
/* @var $data UploadFile */
?>

<div class="col-sm-4">
<div class="panel panel-default">
	<div class="panel-heading">
	<b><?php echo CHtml::encode($data->name); ?></b><b  class="pull-right"><i class="fa fa-download"></i> <?php echo CHtml::encode($data->count); ?></b>
	</div>
	<div class="panel-body text-center">
	<?php if($data->permission > 0): ?>
		<?php if(Yii::app()->user->isVIP()): ?>
			<a href="<?php echo Yii::app()->request->baseUrl; ?>/uploadFile/url/<?php echo $data->id; ?>" class="btn btn-sm btn-color">Download <i class="fa fa-cloud-download"></i></a>
		<?php else: ?>
			<button type="button" class="btn btn-sm btn-color" disabled="disabled">Download <i class="fa fa-cloud-download"></i></button>
			<?php echo Yii::t('app', 'VIP Member Only', array()); ?>
		<?php endif; ?>
	<?php else: ?>
		<?php if(Yii::app()->user->isMember()): ?>
			<a href="<?php echo Yii::app()->request->baseUrl; ?>/uploadFile/url/<?php echo $data->id; ?>" class="btn btn-sm btn-color">Download <i class="fa fa-cloud-download"></i></a>
		<?php else: ?>
			<button type="button" class="btn btn-sm btn-color" disabled="disabled">Download <i class="fa fa-cloud-download"></i></button>
			<?php echo Yii::t('app', 'Please Login', array()); ?> <?php echo CHtml::link('Login', array('site/login')); ?> 
		<?php endif; ?>
	<?php endif; ?>
	
	
	</div>
</div>
</div>