<?php
/* @var $this LocationsController */
/* @var $data Locations */
?>

<div class="col-sm-6">
<div class="panel panel-default">
	<div class="panel-heading">
	<?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?><?php echo CHtml::link(CHtml::encode(''), array('update', 'id'=>$data->id),array('class'=>'fa fa-pencil fa-fw pull-right',
						'rel'=>'tooltip',
						'data-toggle'=>'tooltip',
		            	'data-placement'=>'top',
		            	'data-original-title'=>'Update')); ?><?php echo CHtml::link(CHtml::encode(''), array('view', 'id'=>$data->id),array('class'=>'fa fa-eye fa-fw pull-right',
						'rel'=>'tooltip',
						'data-toggle'=>'tooltip',
		            	'data-placement'=>'top',
		            	'data-original-title'=>'View')); ?></div><div class="panel-body">	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('building')); ?>:</b>
	<?php echo CHtml::encode($data->building); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('size')); ?>:</b>
	<?php echo CHtml::encode($data->size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('volumn')); ?>:</b>
	<?php echo CHtml::encode($data->volumn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('computer')); ?>:</b>
	<?php echo CHtml::encode($data->computer); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('projector')); ?>:</b>
	<?php echo CHtml::encode($data->projector); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visualizer')); ?>:</b>
	<?php echo CHtml::encode($data->visualizer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('microphone')); ?>:</b>
	<?php echo CHtml::encode($data->microphone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('television')); ?>:</b>
	<?php echo CHtml::encode($data->television); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('air')); ?>:</b>
	<?php echo CHtml::encode($data->air); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fan')); ?>:</b>
	<?php echo CHtml::encode($data->fan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('other')); ?>:</b>
	<?php echo CHtml::encode($data->other); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('picture')); ?>:</b>
	<?php echo CHtml::encode($data->picture); ?>
	<br />

	*/ ?>
</div>
</div>
</div>